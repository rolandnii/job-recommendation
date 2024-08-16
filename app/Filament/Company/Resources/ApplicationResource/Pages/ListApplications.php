<?php

namespace App\Filament\Company\Resources\ApplicationResource\Pages;

use App\Filament\Company\Resources\ApplicationResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListApplications extends ListRecords
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make("All "),
            Tab::make("Pending ")->modifyQueryUsing(fn(Builder $query) => $query->where("status", "pending")),
            Tab::make("Shortlisted ")->modifyQueryUsing(fn(Builder $query) => $query->where("status", "shortlisted")),
            Tab::make("Rejected ")->modifyQueryUsing(fn(Builder $query) => $query->where("status","rejected"))
        ] ;
    }
}
