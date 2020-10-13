<?php

namespace TheOfficeFaker\Laravel;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use TheOfficeFaker\Provider\TheOffice;

class TheOfficeServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $faker = $this->app->make(Generator::class);
        $faker->addProvider(new TheOffice($faker));
    }
}