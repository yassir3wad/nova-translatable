<?php

namespace MrMonat\Translatable;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('translatable', __DIR__ . '/../dist/js/field.js');
            Nova::style('translatable', __DIR__ . '/../dist/css/field.css');
            Nova::provideToScript([
                'tinymce_api_key' => config('nova.tinymce_api_key'),
            ]);
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
