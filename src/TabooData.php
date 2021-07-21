<?php

namespace Kovah;

class TabooData
{
    /** @var string[] */
    public static $availableLanguages = [
        'en',
        'de',
    ];

    /**
     * Get all languages and their categories, together with the category descriptors.
     * Does not include any keyword data.
     *
     * @return array|null
     * @throws \Exception
     */
    public static function getCategories(): ?array
    {
        return self::getFileContents('categories.json');
    }

    /**
     * Get the keywords from a category.
     *
     * @param string $category
     * @param string $language Standard is EN
     * @return array|null
     * @throws \Exception
     */
    public static function getCategory(string $category, string $language = 'en'): ?array
    {
        $category = self::appendFileExtension($category);

        if (!in_array($language, self::$availableLanguages)) {
            throw new \Exception("The language $language is not available.");
        }

        return self::getFileContents("$language/$category");
    }

    /**
     * @param string $category
     * @return string
     */
    private static function appendFileExtension(string $category): string
    {
        if (strpos($category, '.json') === false) {
            $category .= '.json';
        }

        return $category;
    }

    /**
     * @param string $file
     * @return mixed
     * @throws \Exception
     */
    private static function getFileContents(string $file)
    {
        if (!file_exists(__DIR__ . '/data/' . $file)) {
            throw new \Exception('File not found');
        }

        $content = file_get_contents(__DIR__ . '/data/' . $file);
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON');
        }

        return $data;
    }
}
