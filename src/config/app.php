<?php

return [
    'permission_user_table' => 'permission_user',
    /*
      |--------------------------------------------------------------------------
      | Autoloaded Service Providers
      |--------------------------------------------------------------------------
      |
      | The service providers listed here will be automatically loaded on the
      | request to your application. Feel free to add your own services to
      | this array to grant expanded functionality to your applications.
      |
     */
    'providers' => [
        Sroutier\EloquentLDAP\Providers\EloquentLDAPServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
        Laracasts\Flash\FlashServiceProvider::class,
        YAAP\Theme\ThemeServiceProvider::class,
        Zizaco\Entrust\EntrustServiceProvider::class,
    ],
    /*
      |--------------------------------------------------------------------------
      | Class Aliases
      |--------------------------------------------------------------------------
      |
      | This array of class aliases will be registered when this application
      | is started. However, feel free to register as many as you wish as
      | the aliases are "lazy" loaded so they don't hinder performance.
      |
     */
    'aliases' => [
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'Debugbar' => Barryvdh\Debugbar\Facade::class,
        'Flash' => Laracasts\Flash\Flash::class,
        'Theme' => YAAP\Theme\Facades\Theme::class,
        'Entrust' => Zizaco\Entrust\EntrustFacade::class,
    ],
];
