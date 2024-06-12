<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('web')
                ->namespace('App\Http\Controllers')
                ->group(base_path('routes/web.php'));
            Route::middleware('web')
                ->namespace('App\Http\Controllers\App')
                ->group(base_path('routes/tenant.php'));
        },
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::namespace('Tenant')->prefix('tenant')->name('tenant.')->group(base_path('routes/tenant.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('web', [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);
        $middleware->group('tenant', [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Spatie\Multitenancy\Http\Middleware\NeedsTenant::class,
            \Spatie\Multitenancy\Http\Middleware\EnsureValidTenantSession::class,
        ]);
        /*$middleware->appendToGroup("web", \App\Http\Middleware\InitializeTenancyByDomain::class);
        $middleware->appendToGroup("web", \Illuminate\Session\Middleware\StartSession::class);
        $middleware->appendToGroup("auth", \Illuminate\Session\Middleware\StartSession::class);
        $middleware->appendToGroup("tenant", \Illuminate\Session\Middleware\StartSession::class);*/
        /*$middleware->appendToGroup("web", \Illuminate\View\Middleware\ShareErrorsFromSession::class);*/
        $middleware->alias([
            'tenant' => \Spatie\Multitenancy\Http\Middleware\NeedsTenant::class,
            'tenant_session' => \Spatie\Multitenancy\Http\Middleware\EnsureValidTenantSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
