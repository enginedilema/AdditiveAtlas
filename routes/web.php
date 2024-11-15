<?php

use App\Http\Controllers\AdditiveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\TranslateAdditiveController;

$languages = ['en', 'es', 'fr', 'de', 'it', 'ca', 'pt']; // Lista de idiomas disponibles
Route::get('/', function () use ($languages) {
    if(session('locale') !== null) {
        return redirect('/'.session('locale'));
    }
    $browserLang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'), 0, 2); // Detecta el idioma del navegador
    if (in_array($browserLang, $languages)) {
        Session::put('locale', $browserLang);
        return redirect("/$browserLang");
    }
    Session::put('locale', 'en');
    return redirect('/en');
});
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::group(['prefix' => '{lang}', 'where' => ['lang' => implode('|', $languages)]], function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');

Route::get('/set-language/{language}', function ($lang, $language) {
    Session::put('locale', $language);
    return redirect('/');
})->name('set.language');

    Route::get('/additives/{name}/{code}/{id}', [AdditiveController::class, 'show'])->name('additives.show');
    Route::get('/search', SearchController::class)->name('search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('theme', function () {
    return view('layouts.theme');
})->name('theme');

Route::get('gemini' , [GeminiController::class, 'generateContent'])->name('gemini');
Route::get('translate' , [TranslateAdditiveController::class, 'translate'])->name('translate');
Route::get('translate-deepl' , [TranslateAdditiveController::class, 'translateDeepL'])->name('translate.deepl');