<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['front.includes.new_header', 'front.includes.new_footer'], function ($view) {
            $contact = Contact::where('status', 1)->first();
            $view->with('front.contact', $contact);
        });
    }
}
