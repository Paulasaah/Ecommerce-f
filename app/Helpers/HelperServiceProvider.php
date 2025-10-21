<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\ImageHelper;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the ImageHelper as a singleton
        $this->app->singleton('image-helper', function ($app) {
            return new ImageHelper();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register Blade directives for image helpers
        Blade::directive('productImage', function ($expression) {
            return "<?php echo \App\Helpers\ImageHelper::getProductImage($expression); ?>";
        });

        Blade::directive('categoryImage', function ($expression) {
            return "<?php echo \App\Helpers\ImageHelper::getCategoryImage($expression); ?>";
        });

        // Register view composers for common data
        view()->composer('*', function ($view) {
            // Make ImageHelper available in all views
            $view->with('imageHelper', new ImageHelper());
        });
    }
}

// ===== INSTRUCCIONES DE INSTALACIÓN =====
//
// 1. Guarda este archivo en: app/Providers/HelperServiceProvider.php
//
// 2. Registra el provider en config/app.php:
//    'providers' => [
//        // ... otros providers
//        App\Providers\HelperServiceProvider::class,
//    ],
//
// 3. Ahora puedes usar los helpers de dos formas:
//
//    OPCIÓN A - En las vistas Blade:
//    @productImage($product)
//    @categoryImage($category)
//
//    OPCIÓN B - Usando la clase directamente:
//    {{ \App\Helpers\ImageHelper::getProductImage($product) }}
//    {{ \App\Helpers\ImageHelper::getCategoryImage($category) }}
//
// 4. Después de registrar, ejecuta:
//    composer dump-autoload
//    php artisan config:clear
//    php artisan cache:clear
