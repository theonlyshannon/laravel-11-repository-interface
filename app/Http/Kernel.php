<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

    /**
    * Import Middleware
    */
    use App\Http\Middleware\TrustProxies;
    use Illuminate\Http\Middleware\HandleCors;
    use App\Http\Middleware\PreventRequestsDuringMaintenance;
    use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
    use App\Http\Middleware\TrimStrings;
    use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;

    /**
    * Import Middleware Groups
    */
    use App\Http\Middleware\EncryptCookies;
    use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
    use Illuminate\Session\Middleware\StartSession;
    use Illuminate\View\Middleware\ShareErrorsFromSession;
    use App\Http\Middleware\VerifyCsrfToken;
    use Illuminate\Routing\Middleware\SubstituteBindings;
    use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

    /**
    * Import Middleware Aliases
    */
    use App\Http\Middleware\Authenticate;
    use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
    use Illuminate\Session\Middleware\AuthenticateSession;
    use Illuminate\Http\Middleware\SetCacheHeaders;
    use Illuminate\Auth\Middleware\Authorize;
    use App\Http\Middleware\RedirectIfAuthenticated;
    use Illuminate\Auth\Middleware\RequirePassword;
    use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
    use App\Http\Middleware\ValidateSignature;
    use Illuminate\Routing\Middleware\ThrottleRequests;
    use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        TrustProxies::class,
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class
    ];

    /**
     * The application's route middleware groups.
     *
     * These middleware groups may be assigned to routes.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Middleware aliases may be assigned to routes and groups.
     * This allows for cleaner code when assigning middleware.
     *
     * @var array<string, class-string|string>
     */

    protected $middlewareAliases = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'auth.session' => AuthenticateSession::class,
        'cache.headers' => SetCacheHeaders::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'password.confirm' => RequirePassword::class,
        'precognitive' => HandlePrecognitiveRequests::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        'verified' => EnsureEmailIsVerified::class,
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
    ];
}
