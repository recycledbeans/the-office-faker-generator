<?php

namespace TheOfficeFaker\Data;

class Companies implements DataInterface
{
    public static function get(): array
    {
        return [
            'Dunder Mifflin',
            'Sabre',
            'Michael Scott Paper Company',
            'Prince Family Paper',
            'Saticoy Steel',
            'Shoe-La-La',
            'Steamtown Mall',
            'Here Comes Treble',
            'Dunmore High School',
            'WUPHF.com',
            'Schrute Farms',
            'Serenity by Jan',
            'Mike\'s Cereal Shack',
            'Vance Refrigeration',
            'Scranton White Pages',
            'Poor Richard\'s Pub',
            'Sandals Jamaica',
            'Pizza by Alfredo',
            'Alfredo\'s Pizza Cafe',
            'W.B. Jones Heating & Air',
            'Dwight Schrute\'s Gym for Muscles',
            'Sesame Avenue Daycare Center for Infants and Toddlers',
            'Cress Tool & Die',
            'Disaster Kits Limited',
        ];
    }
}
