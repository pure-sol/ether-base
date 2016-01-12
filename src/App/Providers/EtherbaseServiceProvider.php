<?php

namespace Etherbase\App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class EtherbaseServiceProvider extends ServiceProvider {

    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Etherbase\App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Etherbase\App\Http\Middleware\VerifyCsrfToken::class,
        \Etherbase\App\Http\Middleware\ThemeSelector::class,
        \Etherbase\App\Http\Middleware\WalledGarden::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Etherbase\App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \Etherbase\App\Http\Middleware\RedirectIfAuthenticated::class,
        'authorize' => \Etherbase\App\Http\Middleware\AuthorizeRoute::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router) {
        include dirname(__DIR__) . '/Http/routes.php';


        // Register middleware
        $httpKernel = $this->app['Illuminate\Contracts\Http\Kernel'];

        foreach ($this->middleware as $middleware) {
            $httpKernel->pushMiddleware($middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $router->middleware($key, $middleware);
        }

        // Loading views
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'etherbase');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        // Registering package libraries service providers

        $providers = [
            \Collective\Html\HtmlServiceProvider::class,
            \Laracasts\Flash\FlashServiceProvider::class,
            \YAAP\Theme\ThemeServiceProvider::class,
            \Zizaco\Entrust\EntrustServiceProvider::class,
        ];

        $aliases = [
            'Form' => \Collective\Html\FormFacade::class,
            'Html' => \Collective\Html\HtmlFacade::class,
            'Flash' => \Laracasts\Flash\Flash::class,
            'Theme' => \YAAP\Theme\Facades\Theme::class,
            'Entrust' => \Zizaco\Entrust\EntrustFacade::class,
        ];

        // Loading Package specific config files
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/app.php', 'app');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/entrust.php', 'entrust');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/audit.php', 'audit');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/auth.php', 'auth');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/theme.php', 'theme');

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }

        foreach ($aliases as $alias => $class) {
            \Illuminate\Foundation\AliasLoader::getInstance()->alias($alias, $class);
        }
    }

}
