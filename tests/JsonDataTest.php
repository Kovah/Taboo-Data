<?php

use PHPUnit\Framework\TestCase;

class JsonDataTest extends TestCase
{
    public function testAnimalsJson(): void
    {
        $data = $this->executeJsonTest('animals');
        $this->assertIsArray($data);
    }

    public function testCarsJson(): void
    {
        $data = $this->executeJsonTest('cars');
        $this->assertIsArray($data);
    }

    public function testCityCountryJson(): void
    {
        $data = $this->executeJsonTest('city-country');
        $this->assertIsArray($data);
    }

    public function testFoodJson(): void
    {
        $data = $this->executeJsonTest('food');
        $this->assertIsArray($data);
    }

    public function testLiteratureJson(): void
    {
        $data = $this->executeJsonTest('literature');
        $this->assertIsArray($data);
    }

    public function testPeopleJson(): void
    {
        $data = $this->executeJsonTest('people');
        $this->assertIsArray($data);
    }

    public function testSportsJson(): void
    {
        $data = $this->executeJsonTest('sports');
        $this->assertIsArray($data);
    }

    public function testThingsJson(): void
    {
        $data = $this->executeJsonTest('things');
        $this->assertIsArray($data);
    }

    public function testTvJson(): void
    {
        $data = $this->executeJsonTest('tv');
        $this->assertIsArray($data);
    }

    public function testWebJson(): void
    {
        $data = $this->executeJsonTest('web');
        $this->assertIsArray($data);
    }

    /**
     * @param $category
     * @return array|null
     */
    private function executeJsonTest($category)
    {
        try {
            return \Kovah\TabooData::getCategory($category);
        } catch (\Exception $e) {
            $this->fail("JSON invalid for category $category");
            return null;
        }
    }
}
