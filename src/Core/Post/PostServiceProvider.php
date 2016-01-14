<?php

namespace Etherbase\Core\Post;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider {

    public function boot() {
        
    }

    public function register() {
        $this->app->bind('Post', function($app) {
            return new Post($app->make('Etherbase\App\Repositories\PostRepository'));
        });
    }

}
