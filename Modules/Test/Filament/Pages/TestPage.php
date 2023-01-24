<?php

namespace Modules\Test\Filament\Pages;

use Filament\Pages\Page;

class TestPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static function getNavigationGroup(): ?string
    {
        return config('test.navigation-group.name');
    }

    protected static string $view = 'modules.test.filament.pages.test-page';
}
