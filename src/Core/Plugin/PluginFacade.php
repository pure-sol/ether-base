<?php

namespace Etherbase\Core\Plugin;

use Illuminate\Support\Facades\Facade;

class PluginFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'Plugin';
    }

}
