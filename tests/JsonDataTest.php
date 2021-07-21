<?php

use PHPUnit\Framework\TestCase;

class JsonDataTest extends TestCase
{
    public static $languages = [
        'de',
        'en',
    ];

    public function testValidJson(): void
    {
        foreach (self::$languages as $language) {
            $files = glob(__DIR__ . "/../src/data/$language/*.json");

            foreach ($files as $file) {
                $this->checkJsonForFile($language, $file);
            }
        }
    }

    private function checkJsonForFile($language, $file): void
    {
        json_decode(file_get_contents($file));

        $filename = pathinfo($file, PATHINFO_BASENAME);
        $errMsg = "JSON invalid in file $language/$filename";

        self::assertEquals(JSON_ERROR_NONE, json_last_error(), $errMsg);
    }
}
