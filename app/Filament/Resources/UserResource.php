<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\RelationManagers;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\User;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static function getNavigationGroup(): ?string
    {
        return config('admin.navigation.name','Administrator');
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
//                    Forms\Components\SpatieMediaLibraryFileUpload::make("avatar")
//                        ->collection("avatar")
//                        ->columnSpan(2),
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
                Tables\Columns\SpatieMediaLibraryImageColumn::make("avatar")
                    ->conversion("avatar"),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
