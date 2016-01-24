<?php

namespace Etherbase\Core\Taxonomy;

use Illuminate\Support\ServiceProvider;
use \Etherbase\Core\Taxonomy\Taxonomy;

class TaxonomyServiceProvider extends ServiceProvider {

    public function boot() {
        
    }

    public function register() {
        $this->app->singleton('Taxonomy', function($app) {
            return new Taxonomy($app->make('Etherbase\App\Repositories\TermRepository'), $app->make('Etherbase\App\Repositories\TermTaxonomyRepository'), $app->make('Etherbase\App\Repositories\TermTaxonomyRelationshipsRepository'));
        });
    }

}
