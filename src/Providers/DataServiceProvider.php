<?php

namespace Pta\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Pta\Contact\Handlers\Events\EventHandler;
use Pta\Contact\Repositories\ContactRepository;
use Pta\Contact\Repositories\ContactRepositoryInterface;

class DataServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        $this->app['events']->subscribe(EventHandler::class);
    }
    
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        // Register the translation
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
    }
}
