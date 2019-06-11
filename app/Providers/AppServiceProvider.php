<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.left_menu', function ($view) {
            $cats = Category::where('depth',1)
                ->orderBy('lft')
                ->get();
            $view->with('mainCategories',$cats);
        });

        View::composer(['web.layouts.app','layouts.app'],function($view){
            $menus = Menu::get();
            $topMenus = $menus->where('menu_type', 'top');
            $middleMenus = $menus->where('menu_type', 'middle');
            $view->with([
                'menus' => $menus,
                'topMenus' => $topMenus,
                'middleMenus' => $middleMenus,
            ]);
        });
    }
}
