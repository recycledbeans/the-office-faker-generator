<?php

namespace TheOfficeFaker\Laravel;

use Faker\Generator;
use TheOfficeFaker\Provider\TheOffice;
use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app()->bind(Generator::class, function ($app) {
            $faker = new Generator();
            $faker->addProvider(new TheOffice($faker));

            return $faker;
        });
    }
}
