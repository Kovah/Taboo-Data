<?php

use PHPUnit\Framework\TestCase;

class PhpHelperTest extends TestCase
{
    public function testGetCategories(): void
    {
        $loadedCategories = \Kovah\TabooData::getCategories();

        $this->assertArrayHasKey('de', $loadedCategories);
        $this->assertArrayHasKey('animals', $loadedCategories['de']);
        $this->assertArrayHasKey('text', $loadedCategories['de']['animals']);
    }

    public function testGetValidCategory(): void
    {
        $data = \Kovah\TabooData::getCategory('animals');

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    public function testGetValidCategoryWithExtension(): void
    {
        $data = \Kovah\TabooData::getCategory('animals.json');

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    public function testGetValidCategoryWithLanguage(): void
    {
        $data = \Kovah\TabooData::getCategory('de/animals');

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    public function testGetInvalidCategory(): void
    {
        try {
            \Kovah\TabooData::getCategory('not-existing-category');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'File not found');
            return;
        }

        $this->fail();
    }
}
