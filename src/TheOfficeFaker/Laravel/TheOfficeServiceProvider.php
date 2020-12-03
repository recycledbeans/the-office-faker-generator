<?php

namespace TheOfficeFaker\Laravel;

use Faker\Factory;
use TheOfficeFaker\Provider\TheOffice;
use Illuminate\Support\ServiceProvider;

class TheOfficeServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->app->bind('Faker\Generator', function () {
            $factory = Factory::create(config('app.faker_locale'));
            $factory->addProvider(new TheOffice($factory));

            return $factory;
        });
    }
}
