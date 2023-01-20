<?php

namespace Modules\Utility\Filament\Resources;

use Modules\Utility\Filament\Resources\PermissionResource\Pages;
use Modules\Utility\Filament\Resources\PermissionResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Permission;


class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-open';

    protected static function getNavigationGroup(): ?string
    {
        return \trans("lang.setting");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->unique("permissions","name",ignorable: fn($record)=>$record, ignoreRecord: true)
                    ->required(),
                Forms\Components\BelongsToManyCheckboxList::make("roles")
                    ->relationship("roles","name"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->searchable(),
                Tables\Columns\TextColumn::make("roles_count")
                    ->counts('roles'),
                Tables\Columns\TextColumn::make("created_at")
                    ->dateTime("M d, Y H:i:s")
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \Modules\Utility\Filament\Resources\PermissionResource\Pages\ListPermissions::route('/'),
            'create' => \Modules\Utility\Filament\Resources\PermissionResource\Pages\CreatePermission::route('/create'),
            'edit' => \Modules\Utility\Filament\Resources\PermissionResource\Pages\EditPermission::route('/{record}/edit'),
        ];
    }
}
