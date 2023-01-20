<?php

namespace Modules\Utility\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\PluginServiceProvider;
use Modules\Utility\Filament\Resources\PermissionResource;
use Modules\Utility\Filament\Resources\RoleResource;
use Modules\Utility\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;
use Modules\Utility\Filament\Pages\UtilityPage;

class FilamentServiceProvider extends PluginServiceProvider
{
    public function isEnabled(): bool{
        $module = \Module::find('utility');
        return $module->isEnabled();
    }
    protected array $pages = [
        UtilityPage::class,
    ];
    protected array $resources =[
        UserResource::class,
        PermissionResource::class,
        RoleResource::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package->name('utility');
    }

    public function getResources(): array
    {
        return ($this->isEnabled())?$this->resources:[];
    }

    public function getPages(): array
    {
        return ($this->isEnabled())?$this->pages:[];
    }

    public function boot():void
    {
        Filament::serving(function (){
            if(config('utility.navigation-group.enabled'))
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label(config('utility.navigation-group.name'))
            ]);
        });
    }
}
