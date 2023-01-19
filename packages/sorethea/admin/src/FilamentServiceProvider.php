<?php

namespace Sorethea\Admin;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\PluginServiceProvider;
use Livewire\Livewire;
use Sorethea\Admin\Filament\Resources\RoleResource;
use Sorethea\Admin\Filament\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentServiceProvider extends PluginServiceProvider
{
    public static string $name = 'admin';
    public function configurePackage(Package $package): void
    {
        $package->name('admin');
    }
    public function boot():void
    {
//        Livewire::component('EditRole',RoleResource\Pages\EditRole::class);
//        Livewire::component('CreateRole',RoleResource\Pages\CreateRole::class);
//        Livewire::component('EditUser',UserResource\Pages\CreateUser::class);
//        Livewire::component('CreateUser',UserResource\Pages\EditUser::class);
        Filament::serving(function (){
            if(config('admin.navigation.enabled'))
                Filament::registerNavigationGroups([
                    NavigationGroup::make()
                        ->label(config('admin.navigation.name'))
                ]);
        });
    }

    protected function getResources(): array
    {
        return [
            RoleResource::class,
            UserResource::class,
        ];
    }
}
