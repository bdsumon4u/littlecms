<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

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
        Model::unguard();

        //Register scripts
        FilamentFabricator::registerScripts([
            '/js/jquery.min.js',
            '/js/popper.min.js',
            '/js/bootstrap.min.js',
            '/js/owl.carousel.min.js',
            '/js/jquery.easing.min.js',
            '/js/jquery.magnific-popup.min.js',
            '/js/parallaxie.js',
            '/js/isotope.pkgd.min.js',
            '/js/packery-mode.pkgd.min.js',
            '/js/imagesloaded.pkgd.js',
            // '/js/clock.js',
            // '/js/counter.js',
            '/js/custom.js',
        ]);

        //Register styles
        FilamentFabricator::registerStyles([
            'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,300&family=Oswald:wght@200;300;400;500;600;700&display=swap', //external url
            '/css/bootstrap.min.css',
            '/css/font-awesome.min.css',
            '/css/owl.carousel.css',
            '/css/owl.theme.default.css',
            '/css/magnific-popup.css',
            '/css/clock.css',
            '/css/animate.css',
            '/css/style.css',
        ]);
    }
}
