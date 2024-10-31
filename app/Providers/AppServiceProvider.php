<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('database.default') === 'sqlite') {
            DB::statement('PRAGMA journal_mode=WAL;'); // Habilitar WAL para concurrencia
            DB::statement('PRAGMA synchronous=NORMAL;'); // Sincronización para mejor rendimiento
            DB::statement('PRAGMA foreign_keys=ON;'); // Habilitar claves foráneas
            DB::statement('PRAGMA cache_size=10000;'); // Aumentar tamaño de la caché
        }
    }
}
