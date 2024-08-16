<?php

namespace App\Filament\Resources;

use App\Enums\JobType;
use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('created_by')
                    ->relationship('user', 'name')
                    ->default(auth()->user()->id)
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn(Model $model) => $model->full_name)
                    ->hiddenOn(['create', 'edit']),

                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('salary')
                    ->prefix('GHC')
                    ->label('Salary')
                    ->string(),
                Forms\Components\Select::make('categories')
                    ->options(function () {
                        return Category::query()->pluck('name', 'id');
                    })
                    ->preload()
                    ->searchable()
                    ->multiple(),
                Forms\Components\ToggleButtons::make('job_type')
                    ->options(JobType::class)
                    ->inline(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Repeater::make('qualification')
                    ->label('Qualifications')
                    ->simple(
                        Forms\Components\TextInput::make('item')
                    )
                    ->defaultItems(1)
                    ->minItems(1)
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('skill')
                    ->label('Skills')
                    ->simple(
                        Forms\Components\TextInput::make('list'),
                    )
                    ->columnSpanFull()
                    ->defaultItems(1)
                    ->minItems(1),
                Forms\Components\TextInput::make('location')
                    ->string()
                    ->nullable(),
                Forms\Components\DatePicker::make('end_date')
                    ->date()
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary')
                    ->prefix('GHC ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.full_name')
                    ->label('Created by')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListJobs::route('/'),
//            'create' => Pages\CreateJob::route('/create'),
//            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
