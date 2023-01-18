<?php

namespace Modules\Test\Providers;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Modules\Test\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        UserResource::class
    ];
    public function configurePackage(Package $package): void
    {
        $package->name("test");
    }
}
