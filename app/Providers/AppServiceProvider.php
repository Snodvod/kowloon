<?php

namespace App\Providers;

use App\Category;
use App\Faq;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        $faqs = Faq::all();

        view()->composer('master', function($view) use($categories, $faqs) {
            $view->with(['categories' => $categories, 'faqs' => $faqs]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
