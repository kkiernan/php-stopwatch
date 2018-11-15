<?php

namespace Kiernan\Laravel;

use Illuminate\Support\ServiceProvider;
use Kiernan\Stopwatch;

class StopwatchServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('stopwatch', function ($app) {
            return new Stopwatch();
        });
    }
}
