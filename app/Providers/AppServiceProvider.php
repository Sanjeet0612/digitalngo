<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Contact;
use App\Models\Admin\Partner;

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
        // header & footer ke liye
        View::composer(
            ['front.includes.new_header', 'front.includes.new_footer','front.contact'],
            function ($view) {
                $contact = Contact::where('status', 1)->first();
                $view->with('contact', $contact); // simple variable name
            }
        );

        // New Partner (footer me include)
        View::composer('front.includes.new_partner', function ($view) {
            $partners = Partner::where('status',1)->get();
            $view->with('partners', $partners);
        });
    }

   
}
