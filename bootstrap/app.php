<?php

use App\Http\Middleware\UserAccess;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'userAccess' => UserAccess::class,
        ]);

        $routeMiddleware = [
            'userAccess' => UserAccess::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
