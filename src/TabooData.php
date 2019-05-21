<?php

namespace Kovah;

class TabooData
{
    /** @var string */
    protected static $standardLanguage = 'de';

    /**
     * @return array|null
     * @throws \Exception
     */
    public static function getCategories(): ?array
    {
        return self::getFileContents('categories.json');
    }

    /**
     * @param string $category
     * @return array|null
     * @throws \Exception
     */
    public static function getCategory(string $category): ?array
    {
        $category = self::appendFileExtension($category);

        if (!self::categoryStringHasLanguage($category)) {
            $category = self::$standardLanguage . '/' . $category;
        }

        return self::getFileContents($category);
    }

    /**
     * @param string $category
     * @return bool
     */
    private static function categoryStringHasLanguage(string $category): bool
    {
        return strpos($category, '/') !== false;
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
