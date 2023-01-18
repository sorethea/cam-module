<?php

namespace Sorethea\Admin\Providers;


use Filament\PluginServiceProvider;
use Sorethea\Admin\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        UserResource::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package->name('admin');
    }
}
