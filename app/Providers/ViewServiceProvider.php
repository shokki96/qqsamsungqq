<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('left_menu', function ($view) {
            $cats = Category::where('depth',1)
                ->orderBy('lft')
                ->get();
            $view->with('mainCategories',$cats);
        });
    }
}
