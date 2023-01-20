<?php

namespace Modules\Utility\Filament\Pages;

use Filament\Pages\Page;

class UtilityPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static function getNavigationGroup(): ?string
    {
        return config('utility.navigation-group.name');
    }

    protected static string $view = 'modules.utility.filament.pages.utility-page';
}
