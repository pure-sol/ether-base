<?php

namespace Etherbase\Core\Meta;

use Illuminate\Support\Facades\Facade;

class MetaFacade extends Facade{

    protected static function getFacadeAccessor() {
        return 'Meta';
    }

}
