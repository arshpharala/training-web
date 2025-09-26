<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        $this->registerAdminRoutes();

        Blade::componentNamespace('App\\View\\Components', 'app');
        Blade::anonymousComponentNamespace('theme.coreui.components', 'coreui');
    }

    protected function registerAdminRoutes()
    {
        Route::middleware(['web'])
            ->prefix('admin')
            ->as('admin.')
            ->group(base_path('routes/admin-auth.php'));

        Route::middleware(['web', 'auth:admin'])
            ->prefix('admin')
            ->as('admin.')
            ->group(base_path('routes/admin.php'));
    }
}
