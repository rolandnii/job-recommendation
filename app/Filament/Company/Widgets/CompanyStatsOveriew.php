<?php

namespace App\Filament\Company\Widgets;

use App\Models\Application;
use App\Models\Job;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CompanyStatsOveriew extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make('Jobs Posted', Job::query()->where("created_by",auth()->user()->id )->count()),
            Stat::make('Applications', Application::whereRelation("job", "created_by", auth()->user()->id)->count()),
        ];
    }
}
