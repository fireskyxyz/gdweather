<?php

namespace Fireskyxyz\Gdweather;

/**
 * Class ServiceProvider
 * @package Fireskyxyz\Gdweather
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     *
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}