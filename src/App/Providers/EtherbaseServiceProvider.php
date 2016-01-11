<?php

namespace Puresolcom\Etherbase\App\Providers;

use Illuminate\Support\ServiceProvider;

class EtherbaseServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        
        // Loading Package specific config files
        $this->mergeConfigFrom(dirname(dirname(__DIR__)). '/config/app.php', 'etherbase');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)). '/config/audit.php', 'etherbase');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)). '/config/auth.php', 'etherbase');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)). '/config/theme.php', 'etherbase');
        
        // Loading views
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'etherbase');
        
        
//        $this->publishes([
//            dirname(__DIR__) . '/resources/views' => base_path('resources/views/vendor/etherbase'),
//        ]);
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
