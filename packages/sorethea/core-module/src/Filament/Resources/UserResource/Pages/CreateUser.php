<?php

namespace Sorethea\Core\Filament\Resources\UserResource\Pages;

use Sorethea\Hieat\Filament\Resources\Settings\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
