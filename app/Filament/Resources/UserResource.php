<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Wizard::make([

                    Forms\Components\Wizard\Step::make('Personal Information')
                        ->schema([
                            Forms\Components\TextInput::make('first_name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('last_name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('phone')
                                ->tel()
                                ->length(10)
                            ,
                            Forms\Components\DateTimePicker::make('email_verified_at')
                                ->hiddenOn(['create'])
                                ->default(now()),
                        ])->columns(2),
                    Forms\Components\Wizard\Step::make('Password Setup')
                        ->schema([
                            Forms\Components\TextInput::make('password')
                                ->same('password_confirmation')
                                ->password()
                                ->required()
                                ->revealable()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('password_confirmation')
                                ->password()
                                ->required()
                                ->revealable()
                                ->maxLength(255),
                        ])->columns(2)
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                ->searchable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->boolean()
                    ->default(false)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
//            ->searchOnBlur()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('add_role')
                    ->label('Add role')
                    ->form([
                        Forms\Components\ToggleButtons::make('user_role')
                            ->label('Role')
                            ->options(Role::class)
                            ->required()
                            ->markAsRequired(false)
                        ->inline()
                    ])
                    ->modalWidth(MaxWidth::Medium)
                    ->action(function (array $data, User $user): void {

                        $user->syncRoles(Arr::flatten($data));

                        Notification::make('')
                            ->success()
                            ->body('user role change')
                            ->send();

                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
