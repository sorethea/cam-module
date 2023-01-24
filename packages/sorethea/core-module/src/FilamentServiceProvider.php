<?php

namespace Sorethea\Core;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Sorethea\Core\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    public static string $name = "core-module";

    protected array $resources = [

        UserResource::class,

    ];

    public function configurePackage(Package $package): void
    {
        $package->name("core-module");
    }
}
