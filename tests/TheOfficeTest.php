<?php

use Faker\Generator as Faker;
use PHPUnit\Framework\TestCase;
use TheOfficeFaker\Data\Companies;
use TheOfficeFaker\Data\MaleNames;
use TheOfficeFaker\Data\FemaleNames;
use TheOfficeFaker\Provider\TheOffice;

/**
 * @internal
 * @coversNothing
 */
final class TheOfficeTest extends TestCase
{
    /**
     * @var TheOffice
     */
    private $faker;
    private $names;

    public function setUp()
    {
        parent::setUp();
        $this->faker = new Faker();
        $this->faker->addProvider(new TheOffice($this->faker));
        $this->names = array_merge(MaleNames::get(), FemaleNames::get());
    }

    public function test_name_returns_a_name_from_the_known_list_of_names()
    {
        $this->assertContains($this->faker->name, $this->names);
    }

    public function test_company_returns_a_company_name_from_the_known_list_of_companies()
    {
        $this->assertContains($this->faker->company, Companies::get());
    }

    public function test_can_get_a_character_name()
    {
        $this->assertContains($this->faker->character()->name, $this->names);
    }

    public function test_can_get_a_character_first_name()
    {
        $character = $this->faker->character();

        $firstName = explode(' ', $character->name)[0];
        $this->assertEquals($firstName, $character->firstName);
    }

    public function test_can_get_a_character_last_name()
    {
        $character = $this->faker->character();

        $lastName = explode(' ', $character->name)[1];
        $this->assertEquals($lastName, $character->lastName);
    }

    public function test_can_get_a_character_safe_email()
    {
        $character = $this->faker->character();
        $firstName = explode(' ', $character->name)[0];
        $lastName = explode(' ', $character->name)[1];
        $emailName = strtolower($firstName) . '.' . strtolower($lastName);

        $this->assertTrue(strpos($character->safeEmail, $emailName) >= 0);
        $this->assertTrue((bool) strpos($character->safeEmail, '@example.net') >= 0);
    }

    public function test_can_get_a_character_email()
    {
        $character = $this->faker->character();
        $firstName = explode(' ', $character->name)[0];
        $lastName = explode(' ', $character->name)[1];
        $emailName = strtolower($firstName) . '.' . strtolower($lastName);

        $this->assertEquals("{$emailName}@dunder-mifflin.com", $character->email);
    }

    public function test_can_get_a_female_character()
    {
        $character = $this->faker->characterFemale();

        $this->assertContains($character->name, FemaleNames::get());
        $this->assertNotContains($character->name, MaleNames::get());
    }

    public function test_can_get_a_male_character()
    {
        $character = $this->faker->characterMale();

        $this->assertContains($character->name, MaleNames::get());
        $this->assertNotContains($character->name, FemaleNames::get());
    }
}
