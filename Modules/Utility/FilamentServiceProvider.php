<?php

namespace Modules\Utility;

use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;
use Modules\Utility\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    public static string $name = 'utility';
    protected array $resources = [
        UserResource::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package->name("utility");
    }
}
