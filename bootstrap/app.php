<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // daftarkan prevent-back-history middleware untuk mencegah user kembali ke halaman sebelumnya
        $middleware->alias([
            'prevent-back-history' => PreventBackHistory::class,
            'isAdmin' => isAdmin::class,
            'isOwner' => isOwner::class,
            'isUser' => isUser::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
