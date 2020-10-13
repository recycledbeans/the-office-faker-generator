# The Office Faker

[![Latest Stable Version](https://poser.pugx.org/recycledbeans/the-office-faker/version)](https://packagist.org/packages/recycledbeans/the-office-faker) [![Build Status](https://travis-ci.org/recycledbeans/the-office-faker-generator.svg?branch=master)](https://travis-ci.org/recycledbeans/the-office-faker-generator) 

## Bears. Beets. Battlestar Galactica.

With this package, you can extend the extremely useful Faker ([fzaninotto/faker](https://github.com/fzaninotto/Faker)) 
Library to seed your PHP application with fake data using characters and companies from 
the hit TV series, The Office (US).

This is vital for when we launch Dunder Mifflin Infinity ✌️-point-👌!

## Installation

Install this package using Composer.

```shell script
composer require recycledbeans/the-office-faker
```

## Usage

Start using characters and company names immediately using the Faker methods you are already familiar with by adding
the provider to your Faker instance.

The example below is using a Laravel Factory as an example, but Faker (and this provider) can be used in any PHP project.

```php
$faker = Faker\Factory::create();
$faker->addProvider(new \TheOfficeFaker\Provider\TheOffice($faker));

// Example usage (more details below)
$name = $faker->character()->name; // Dwight Schrute
$company = $faker->company; // Poor Richard's Pub
```

### 🔥 Laravel

If you are using this package in a Laravel application, you can also make this functionality available to all of 
your factories and tests globally by adding the `TheOfficeFaker\Laravel\TheOfficeServiceProvider::class` to 
the `providers` section of `config/app.php` as detailed in the [Laravel Docs](https://laravel.com/docs/8.x/providers#registering-providers).

## Characters

The default usage above creates truly randomized first and last names, so you will end up with names like "Roy Kapoor" or
"Jim Schrute". If you would like the have the first and last names be consistent with the characters on the show (which 
is probably what most people would enjoy), you can use the character() method to return an object of a character's details.

```php

$character = $faker->character();

return [
    'given_name' => $character->firstName,
    'family_name' => $character->lastName,
    'email' => $character->safeEmail,
];

```

## Companies

There is a small, but growing, list of fictional (and some Scranton-area) company names taken from episodes of The 
Office. You can use these the same way you would use the normal company attribute.

```php
// Michael Scott Paper Company, for instance
$company = $faker->company; 
```

## Contributing

### Running unit tests

This project uses PHPUnit. You can run tests with or without code coverage.

With no code coverage
```bash
./vendor/bin/phpunit
```

With code coverage (you must have Xdebug installed to run code coverage)
```bash
./vendor/bin/phpunit --coverage-html tests/coverage
```

To view the code coverage report open `tests/coverage/index.html` in your browser.

### Ideas

Do you have ideas for other bits of data that you would like to see in this package? Create an issue with your suggestion!

### TODO (I would love your help!)

There is a short list of things I would like to improve or add in the near future to make this provider even better. If 
you would like to help in this endeavor, please feel free to create a pull request. Even if you don't feel like coding, 
if you see someone major that is missing from the characters list or a company that hasn't been added, please create a PR!

- Add more company names: there are plenty of references to fictional companies and Scranton-area places that could be
added for even more variability. 
- Cities and localities: I don't know if there will be enough cities mentioned in the office (mostly from the PA area), 
but I think it's worth looking into whether the provider can _provide_ enough cities to have them added.
- Lines from the episodes? Maybe a text provider that returns a random sentence from an actual line of dialog?
