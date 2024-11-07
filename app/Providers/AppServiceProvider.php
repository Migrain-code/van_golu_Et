<?php

namespace App\Providers;

use App\Core\CustomResourceRegistrar;
use App\Models\City;
use App\Models\ForBusiness;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        $registrar = new CustomResourceRegistrar($this->app['router']);

        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
            return $registrar;
        });

        foreach (Setting::all() as $item) {
            $settings[$item->name] = $item->value;
        }

        \Config::set('settings', $settings);
        $cities = City::all();
        View::share('cities', $cities);

        $languages = Language::orderBy('id', 'asc')->get();
        View::share('languages', $languages);

        Paginator::useBootstrap();
    }
}
