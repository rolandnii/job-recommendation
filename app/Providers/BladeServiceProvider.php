<?php

namespace App\Providers;

use App\Enums\Role;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {


        Blade::anonymousComponentPath(resource_path('views/components/home'),'home');
        Blade::anonymousComponentPath(resource_path('views/components/job'),'job');
        Blade::if('admin', function () {
            return request()->user()?->hasRole(Role::Admin->value);
        });
        Blade::if('company', function () {
            return request()->user()?->hasRole(Role::Company->value);
        });

        Blade::if('student',function () {

            return request()->user()->roles()->doesntExist() || request()->user()?->hasRole(Role::Student->value);
//            return true;
        });


    }
}
