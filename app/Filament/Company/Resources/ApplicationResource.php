<?php

namespace App\Filament\Company\Resources;

use App\Enums\ApplicationStatus;
use App\Filament\Company\Resources\ApplicationResource\Pages;
use App\Filament\Company\Resources\ApplicationResource\RelationManagers;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Expr\AssignOp\Mod;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
//        dd(parent::getEloquentQuery());
        return parent::getEloquentQuery()->whereRelation('job','created_by',auth()->user()->id); // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Applicant Name')
                    ->relationship('user','first_name')
                    ->getOptionLabelFromRecordUsing(fn(Model $model) => $model->full_name)
                    ->disabledOn(['edit','create'])
                    ->required()
                   ,
                Forms\Components\Select::make('job_id')
                    ->relationship('job','name')
                    ->disabledOn(['edit','create'])
                    ->required(),
                Forms\Components\ToggleButtons::make('status')
                ->options(ApplicationStatus::class)
                ->inline()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.full_name')
                    ->label('Applicant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job.name')
                    ->label('Job')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.cv')
                    ->url(fn(Model $record) => asset("storage/" . $record->user->cv), true)
                    ->label("CV")
                ,
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

//            ->modifyQueryUsing(fn (Builder $builder) => $builder->where('id',1))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
