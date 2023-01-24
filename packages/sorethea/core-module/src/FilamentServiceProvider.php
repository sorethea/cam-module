<?php

namespace Sorethea\Core;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    public static string $name = "core-module";

    public function configurePackage(Package $package): void
    {
        $package->name("core-module");
    }
}
