<?php

namespace RecycledBeans\Faker;

use Faker\Provider\Base;

class TheOffice extends Base
{
    protected $employees = [
        'Michael Scott',
        'Dwight Schrute',
        'Pam Beesley',
        'Jim Halpert',
        'Ryan Howard',
        'Andy Bernard',
        'Robert California',
        'Stanley Hudson',
        'Kevin Malone',
        'Meredith Palmer',
        'Angela Martin',
        'Oscar Martinez',
        'Phyllis Lapin',
        'Roy Anderson',
        'Jan Levinson',
        'Kelly Kapoor',
        'Toby Flenderson',
        'Creed Bratton',
        'Darryl Philbin',
        'Erin Hannon',
        'Gabe Lewis',
        'Holly Flax',
        'Nellie Bertram',
        'Clark Green',
        'Pete Miller',
    ];

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

    protected function getOfficePerson()
    {
        return $this->employees[array_rand($this->employees, 1)];
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

    public function person() {
        $person = new \stdClass;

        $name = $this->getOfficePerson();

        $person->name = $name;
        $person->firstName = $this->getFirstNameComponent($name);
        $person->lastName = $this->getLastNameComponent($name);
        $person->safeEmail = strtolower($person->firstName) . '.' . strtolower($person->lastName) . rand(0,9999) . '@example.net';
        $person->email = strtolower($person->firstName) . '.' . strtolower($person->lastName) . '@dunder-mifflin.com';

        return $person;
    }
}
