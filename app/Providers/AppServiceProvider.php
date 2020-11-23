<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        \Cloudinary::config(array( 
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME', "hkzhuqcgm"),
            'api_key' => env('CLOUDINARY_API_KEY', "771659268351773"),
            'api_secret' => env('CLOUDINARY_API_SECRET', "c0xFQad1yO3XxNGbh6vexC3CFR8"),
            "secure" => true
        ));

        if($this->app->environment('production')){
            URL::forceSchema('https');
        }

    }
}
