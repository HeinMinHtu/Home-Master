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
       $middleware->alias([
             'admin'=>App\Http\Middleware\Admin::class,
             'service'=>App\Http\Middleware\Service::class,
             'guest'=>App\Http\Middleware\Guest::class

       ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
