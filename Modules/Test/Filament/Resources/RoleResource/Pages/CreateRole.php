<?php

namespace Modules\Test\Filament\Resources\RoleResource\Pages;

use Modules\Test\Filament\Resources\RoleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;
}
