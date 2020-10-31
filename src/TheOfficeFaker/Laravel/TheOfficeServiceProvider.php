<?php

namespace TheOfficeFaker\Laravel;

use Faker\Generator;
use TheOfficeFaker\Provider\TheOffice;
use Illuminate\Support\ServiceProvider;

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
