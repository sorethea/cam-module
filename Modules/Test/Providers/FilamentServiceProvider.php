<?php

namespace Modules\Test\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\PluginServiceProvider;
use Modules\Test\Filament\Resources\RoleResource;
use Spatie\LaravelPackageTools\Package;
use Modules\Test\Filament\Pages\TestPage;

class FilamentServiceProvider extends PluginServiceProvider
{
    public function isEnabled(): bool{
        $module = \Module::find('test');
        return $module->isEnabled();
    }
    protected array $pages = [
        TestPage::class,
    ];
    protected array $resources =[
        RoleResource::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package->name('test');
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
            if(config('test.navigation-group.enabled'))
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label(config('test.navigation-group.name'))
            ]);
        });
    }
}