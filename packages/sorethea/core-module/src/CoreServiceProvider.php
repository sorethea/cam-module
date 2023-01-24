<?php

namespace Sorethea\Core;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(FilamentServiceProvider::class);
    }

    public function boot()
    {

    }
}
