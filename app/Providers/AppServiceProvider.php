<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        //Pagination
        Paginator::useBootstrapFive();
        //V1
        /*$siteSettings = cache()->remember(
            key: 'siteSettings',
            ttl: 3600,
            callback: fn() => Setting::all()->keyBy('key')
        );
        View::share('siteSettings', $siteSettings);*/

        //V2
        /*if(Schema::hasTable('settings')){
            foreach(Setting::all() as $setting) {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }*/

        //V3
        if (Schema::hasTable('settings')) {
            $settings = Cache::remember('settings', now()->addDay(), function () {
                return Setting::all();
            });

            foreach ($settings as $setting) {
                Config::set('settings.' . $setting->key, $setting->value);
            }

        }
        View::share('settings.', $settings);
    }
}
