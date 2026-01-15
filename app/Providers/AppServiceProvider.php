<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Livewire\Livewire; // Add this at the top
use App\Livewire\EnrollmentWizard; // Add this at the top


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
        //public function boot(): void
{
    Livewire::component('enrollment-wizard', EnrollmentWizard::class);
}
    }

    
}
