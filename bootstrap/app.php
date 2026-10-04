<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        /*
        |--------------------------------------------------------------------------
        | Redirect Guest
        |--------------------------------------------------------------------------
        */

        $middleware->redirectGuestsTo(function () {
            return route('admin.login');
        });


        /*
        |--------------------------------------------------------------------------
        | Role Middleware
        |--------------------------------------------------------------------------
        |
        | Digunakan untuk membatasi akses berdasarkan role pengguna.
        |
        */

        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();