<?php

namespace TheOfficeFaker\Provider;

use Faker\Generator;
use Faker\Provider\Base;
use TheOfficeFaker\Data\Companies;
use TheOfficeFaker\Data\FemaleNames;
use TheOfficeFaker\Data\MaleNames;

class TheOffice extends Base
{
    protected $maleNames;
    protected $femaleNames;
    protected $companies;

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        $this->maleNames = MaleNames::get();
        $this->femaleNames = FemaleNames::get();
        $this->companies = Companies::get();
    }

    public function name()
    {
        return $this->getOfficePerson();
    }

    public function firstName()
    {
        return $this->getFirstNameComponent($this->getOfficePerson());
    }

    public function lastName()
    {
        return $this->getLastNameComponent($this->getOfficePerson());
    }

    public function firstNameFemale()
    {
        return $this->getFirstNameComponent($this->getOfficePerson('female'));
    }

    public function firstNameMale()
    {
        return $this->getFirstNameComponent($this->getOfficePerson('male'));
    }

    protected function getOfficePerson($sex = 'both')
    {
        switch ($sex) {
            case 'male':
                $employees = $this->maleNames;
                break;
            case 'female':
                $employees = $this->femaleNames;
                break;
            default:
                $employees = array_merge($this->maleNames, $this->femaleNames);
        }

        return Base::randomElement($employees);
    }

    public function characterFemale()
    {
        return $this->character('female');
    }

    public function characterMale()
    {
        return $this->character('male');
    }

    protected function getLastNameComponent($value)
    {
        $name = explode(' ', $value);

        return array_reverse($name)[0];
    }

    public function getFirstNameComponent($value)
    {
        $name = explode(' ', $value);

        return $name[0];
    }

    public function character($sex = 'both')
    {
        $person = new \stdClass;

        $name = $this->getOfficePerson($sex);

        $person->name = $name;
        $person->firstName = $this->getFirstNameComponent($name);
        $person->lastName = $this->getLastNameComponent($name);
        $person->safeEmail = strtolower($person->firstName) . '.' . strtolower($person->lastName) . rand(0, 9999) . '@example.net';
        $person->email = strtolower($person->firstName) . '.' . strtolower($person->lastName) . '@dunder-mifflin.com';

        return $person;
    }

    public function company()
    {
        return $this->companyName();
    }

    public function companyName()
    {
        return Base::randomElement($this->companies);
    }
}
