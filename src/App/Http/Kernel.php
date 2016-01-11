<?php

namespace Puresolcom\Etherbase\App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
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
}
