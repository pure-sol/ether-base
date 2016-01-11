<?php

namespace Puresolcom\Etherbase\App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class EtherbaseServiceProvider extends ServiceProvider {

    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Puresolcom\Etherbase\App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Puresolcom\Etherbase\App\Http\Middleware\VerifyCsrfToken::class,
        \Puresolcom\Etherbase\App\Http\Middleware\ThemeSelector::class,
        \Puresolcom\Etherbase\App\Http\Middleware\WalledGarden::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Puresolcom\Etherbase\App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \Puresolcom\Etherbase\App\Http\Middleware\RedirectIfAuthenticated::class,
        'authorize' => \Puresolcom\Etherbase\App\Http\Middleware\AuthorizeRoute::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Foundation\Http\Kernel $httpKernel, \Illuminate\Routing\Router $router) {
        include dirname(__DIR__) . '/Http/routes.php';

        // Register middlewares
        foreach ($this->middleware as $middleware) {
            $httpKernel->prependMiddleware($middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $router->middleware($key, $middleware);
        }


        // Loading Package specific config files
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/app.php', 'etherbase.app');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/entrust.php', 'etherbase.entrust');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/audit.php', 'etherbase.audit');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/auth.php', 'etherbase.auth');
        $this->mergeConfigFrom(dirname(dirname(__DIR__)) . '/config/theme.php', 'etherbase.theme');

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

        foreach ($providers as $provider) {
            $this->app->register($provider);
        }

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        foreach ($aliases as $alias => $class) {
            $loader->alias($class, $alias);
        }
    }

}
