<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ProjectTool;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (!Cache::store('redis')->has('popular_tools')) {
            $tools = ProjectTool::populars()->take(10)->get();
            Cache::store('redis')->put('popular_tools', $tools, '30');
        }
        view()->share('popular_tools', Cache::store('redis')->get('popular_tools'));


        if (!Cache::store('redis')->has('categories')) {
            $categories = Category::all();
            Cache::store('redis')->put('categories', $categories, '30');
        }
        view()->share('categories', Cache::store('redis')->get('categories'));

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
