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

        $this->assertArrayHasKey('en', $loadedCategories);
        $this->assertArrayHasKey('animals', $loadedCategories['en']);
        $this->assertArrayHasKey('text', $loadedCategories['en']['animals']);
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
        $data = \Kovah\TabooData::getCategory('animals', 'de');

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

    public function testValidCategoryWithInvalidLanguage(): void
    {
        try {
            \Kovah\TabooData::getCategory('animals', 'fr');
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'The language fr is not available.');
            return;
        }

        $this->fail();
    }
}
