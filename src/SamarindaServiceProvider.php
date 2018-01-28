<?php

namespace Novay\Samarinda;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;;

class SamarindaServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind('samarinda', function() {
            return new Samarinda;
        });

        $this->commands(\Novay\Samarinda\Commands\SeedCommand::class);

    }

    public function boot()
    {
        if ($this->isLaravel53AndUp()) {
            $this->loadMigrationsFrom(__DIR__.'/migrations');
        } else {
            $this->publishes([
                __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../config/samarinda.php' => config_path('laravel-samarinda.php'),
        ], 'config');
    }

    protected function isLaravel53AndUp()
    {
        return version_compare($this->app->version(), '5.3.0', '>=');
    }
}
