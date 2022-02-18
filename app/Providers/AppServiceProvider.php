<?php

namespace App\Providers;

use App\Service\MedicalStaffService;
use Illuminate\Support\ServiceProvider;
use App\Service\IMedicalStaffService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind(IMedicalStaffService::class, function($app){
            return new MedicalStaffService();
        });*/

        $this->app->bind(IMedicalStaffService::class, MedicalStaffService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
