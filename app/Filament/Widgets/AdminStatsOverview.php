<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Schema\Builder;

class AdminStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make('Users', User::count()),
            Stat::make('Applications', Application::count()),
            Stat::make('Companies', Company::count()),
            Stat::make('Jobs Posted', Job::count()),
          ];
    }
}
