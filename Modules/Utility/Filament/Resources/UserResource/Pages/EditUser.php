<?php

namespace Modules\Utility\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Utility\Filament\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
