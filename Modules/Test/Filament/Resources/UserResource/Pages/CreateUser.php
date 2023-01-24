<?php

namespace Modules\Test\Filament\Resources\UserResource\Pages;

use Modules\Test\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
