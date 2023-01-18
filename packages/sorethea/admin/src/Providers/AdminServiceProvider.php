<?php

namespace Sorethea\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(FilamentServiceProvider::class);
    }

    public function boot()
    {
    }
}
