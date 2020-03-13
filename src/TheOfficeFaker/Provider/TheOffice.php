<?php

namespace TheOfficeFaker\Provider;

use Faker\Provider\Base;

class TheOffice extends Base
{
    protected $maleNames = [
        'Michael Scott',
        'Dwight Schrute',
        'Ryan Howard',
        'Andy Bernard',
        'Robert California',
        'Stanley Hudson',
        'Kevin Malone',
        'Jim Halpert',
        'Oscar Martinez',
        'Roy Anderson',
        'Toby Flenderson',
        'Creed Bratton',
        'Darryl Philbin',
        'Gabe Lewis',
        'Clark Green',
        'Pete Miller',
        'David Wallace',
        'Devon White',
        'Danny Cordray',
        'Lonny Collins',
        'Jerry DiCanio',
        'Hidetoshi Hasagawa',
        'Gary Trundell',
        'Nate Nickerson',
        'Todd Packer',
        'Charles Miner',
        'Deangelo Vickers',
        'Josh Porter',
        'Ed Truck',
        'Dan Gore',
        'Troy Underbridge',
        'Tony Gardner',
        'Martin Nash',
        'Philip Halpert',
        'Luke Cooper',
        'Mose Schrute',
        'Robert Lipton',
        'Walter Bernard',
        'Bob Vance',
        'Hank Tate',
        'Billy Merchant',
    ];

    protected $femaleNames = [
        'Pam Beesley',
        'Meredith Palmer',
        'Angela Martin',
        'Phyllis Lapin',
        'Jan Levinson',
        'Kelly Kapoor',
        'Erin Hannon',
        'Holly Flax',
        'Nellie Bertram',
        'Jo Bennett',
        'Cathy Simms',
        'Karen Filippelli',
        'Madge Madsen',
        'Val Johnson',
        'Jordan Garfield',
        'Hannah Smoterich-Barr',
        'Cecilia Halpert',
        'Katy Moore',
        'Isabel Poreba',
        'Carole Stills',
        'Donna Newton',
        'Brenda Matlowe',
        'Deborah Shoshlefski',
    ];

    protected $companies = [
        'Dunder Mifflin',
        'Sabre',
        'Michael Scott Paper Company',
        'Prince Family Paper',
        'Saticoy Steel',
        'Shoe-La-La',
        'Steamtown Mall',
        'Here Comes Treble',
        'Dunmore High School',
        'Schrute Farms'
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
