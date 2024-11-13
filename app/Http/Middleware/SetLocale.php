<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //$locale = Session::get('locale', config('app.locale'));
        $locale = $request->route('lang'); // Obtiene el prefijo de idioma de la URL
        
        if (in_array($locale, ['en', 'es', 'fr', 'de', 'it', 'ca', 'pt'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        return $next($request);
    }
}
