<?php namespace Potelo\LaravelPredictionIO\Provider;

use Config;
use Illuminate\Support\ServiceProvider;
use predictionio\EngineClient;
use predictionio\EventClient;

class PredictionIOServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application
     *
     */
    public function boot()
    {
    }

    /**
     * Register to service provider
     *
     */
    public function register()
    {
        $this->app->singleton('eventclient', function ($app) {
            return new EventClient(Config::get('services.predictionio.key'), Config::get('services.predictionio.url'));
        });

        $this->app->singleton('engineclient', function ($app) {
            return new EngineClient(Config::get('services.predictionio.engine_url'));
        });


    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('eventclient','engineclient');
    }

}
