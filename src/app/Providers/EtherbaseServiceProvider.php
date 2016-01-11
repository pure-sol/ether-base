<?php

namespace Puresolcom\Etherbase\Providers;

use Illuminate\Support\ServiceProvider;

class EtherbaseServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'etherbase');

        $this->publishes([
            dirname(__DIR__) . '/resources/views' => base_path('resources/views/vendor/etherbase'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include dirname(__DIR__) . '/Http/routes.php';
    }

}
