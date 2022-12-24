<?php

namespace Fliq\UniqueLaravel;

use Fliq\Unique\Unique;
use Fliq\Unique\UniqueClient;
use Illuminate\Support\ServiceProvider;

class UniqueServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/unique.php', 'unique');

        $this->app->singleton('unique', function ($app) {
            if($seed = config('unique.seed')) {
                $headers =  ['Authorization' => 'Seed '. $seed];
            }

            return new Unique(
                new UniqueClient(
                    config('unique.base_url'),
                    $headers ?? [],
                )
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['unique'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/unique.php' => config_path('unique.php'),
        ], 'unique.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fliq'),
        ], 'unique.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fliq'),
        ], 'unique.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fliq'),
        ], 'unique.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
