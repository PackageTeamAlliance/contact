<?php

namespace Pta\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Pta\Contact\Repositories\ContactRepository;
use Pta\Contact\Repositories\ContactRepositoryInterface;

class DataServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function boot()
    {
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
