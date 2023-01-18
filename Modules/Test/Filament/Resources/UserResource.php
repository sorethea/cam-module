<?php

namespace Modules\Test\Filament\Resources;

use Carbon\Carbon;
use Modules\Test\Filament\Resources\UserResource\Pages;
use Modules\Test\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static function getNavigationGroup(): ?string
    {
        return config('test.navigation-group.name');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make("name")
                        ->required(),
                    Forms\Components\TextInput::make("email")
                        ->unique("users","email",ignorable: fn($record)=>$record)
                        ->required(),
                    Forms\Components\TextInput::make("password")
                        ->password()
                        ->same("password_confirmation")
                        ->visibleOn("create")
                        ->required(),
                    Forms\Components\TextInput::make("password_confirmation")
                        ->password()
                        ->visibleOn("create")
                        ->required(),
                    //Forms\Components\FileUpload::make("avatar")->columnSpan(2)
                ])->columnSpan(2)->columns(2),
                Forms\Components\Card::make([
                    Forms\Components\Placeholder::make("created_at")
                        ->visibleOn("edit")
                        ->content(fn($record)=>Carbon::make($record->created_at)->since()),
                    Forms\Components\Placeholder::make("updated_at")
                        ->visibleOn("edit")
                        ->content(fn($record)=>Carbon::make($record->updated_at)->since()),
                ])
                    ->visibleOn("edit")
                    ->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make("avatar"),
                Tables\Columns\TextColumn::make("name")->searchable(),
                Tables\Columns\TextColumn::make("email")->searchable(),
                Tables\Columns\TextColumn::make("created_at")->since(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
