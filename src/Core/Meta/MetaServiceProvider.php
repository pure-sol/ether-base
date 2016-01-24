<?php

namespace Etherbase\Core\Meta;

use Illuminate\Support\ServiceProvider;

class MetaServiceProvider extends ServiceProvider {

    public function boot() {
        
    }

    public function register() {
        $this->app->singleton('Meta', function($app) {
            return new MetaAPI($app->make('Etherbase\App\Repositories\UserMetaRepository'), $app->make('Etherbase\App\Repositories\PostMetaRepository'));
        });
    }

}
