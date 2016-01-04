<?php

namespace Pta\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Pta\Contact\Providers\DataServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    
    /**
     * Providers to register
     *
     * @var array
     */
    protected $providers = [DataServiceProvider::class];
    
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBindings();
        
        $this->registerConfig();
        
        $this->registerViews();
        
        $this->populateMenus();
        
        $this->registerTranslations();
        
        $this->registerMigration();
        
        $this->registerRoutes();
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
        
        $this->registerConfig();
    }
    
    /**
     * Register Bindings in IoC.
     *
     * @return void
     */
    protected function registerBindings()
    {
    }
    
    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $configPath = realpath(__DIR__ . '/../../config/config.php');
        
        $this->publishes([ $configPath => config_path('contact.php'), 'config']);
        
        $this->mergeConfigFrom($configPath, 'contact');
    }
    
    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(realpath(__DIR__ . '/../../resources/views'), 'pta/contact');
        
        $this->publishes([realpath(__DIR__ . '/../../resources/views') => base_path('resources/views/vendor/pta/contact'), ]);
    }
    
    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom(realpath(__DIR__ . '/../../resources/lang'), 'pta/contact');
    }
    
    public function registerMigration()
    {
        $this->publishes([realpath(__DIR__ . '/../../database/migrations') => database_path('/migrations') ], 'migrations');
    }
    
    public function populateMenus()
    {
    }
    
    public function registerRoutes()
    {
        $router = $this->app['router'];
        
        $prefix = config('contact.route_prefix', 'dashboard');
        
        $security = config('contact.security.protected', true);
        
        if (!$this->app->routesAreCached()) {
            $group = [];
            
            $group['prefix'] = $prefix;
            
            if ($security) {
                $group['middleware'] = config('contact.security.middleware');
            }
        }



        $router->group(['middleware' => 'web'], function () use ($router) {

            require realpath(__DIR__ .'/../Http/frontend_routes.php');
        });
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
