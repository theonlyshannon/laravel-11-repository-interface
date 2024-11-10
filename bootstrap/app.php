<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\ApplicationBuilder;
use Illuminate\Foundation\Kernel\Kernel;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withSingletons([
        Illuminate\Contracts\Http\Kernel::class => App\Http\Kernel::class,
        Illuminate\Contracts\Console\Kernel::class => App\Console\Kernel::class,
        Illuminate\Contracts\Debug\ExceptionHandler::class => App\Exceptions\Handler::class,
    ])
    ->create();
