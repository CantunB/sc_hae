<?php

namespace HAE\Providers;

use Carbon\Carbon;
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
            $hola = 'hola';
            // $units = Unit::count();
            // $operators = Operator::count();
            // $hotels = Hotel::count();
            // $airlines = Airline::count();
            // $type_services = TypeService::count();
            // $agencies = Agency::count();
            // $sales = Assign
            $view->with([
                'hola' => $hola;
                // 'units' => $units,
                // 'operators' => $operators,
                // 'hotels' => $hotels,
                // 'airlines' => $airlines,
                // 'type_services' => $type_services,
                // 'agencies' => $agencies,
            ]);
        });
    }
}
