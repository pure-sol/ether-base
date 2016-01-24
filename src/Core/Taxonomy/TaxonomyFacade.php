<?php

namespace Etherbase\Core\Taxonomy;

use Illuminate\Support\Facades\Facade;

class TaxonomyFacade extends Facade{

    protected static function getFacadeAccessor() {
        return 'Taxonomy';
    }

}
