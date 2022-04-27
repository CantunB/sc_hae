<?php

namespace HAE\Providers;

use Carbon\Carbon;
use HAE\AssignedAreas;
use HAE\Coordination;
use HAE\Department;
use HAE\Dependency;
use HAE\Providers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
        view()->composer(['layouts.app','home'], function($view){
            $areas = AssignedAreas::count();
            $dependencies = Dependency::count();
            $coordinations = Coordination::count();
            $departments = Department::count();
            $providers = Providers::count();
            $view->with([
                'areas' => $areas,
                'dependencies' => $dependencies,
                'coordinations' => $coordinations,
                'departments' => $departments,
                'providers' => $providers,
            ]);
        });
    }
}
