<?php
if (!isset($argv[1], $argv[2])) {
    echo "Script usage:\n";
    echo "json-to-text.php [language] [source file]\n";
    echo "Example: json-to-text.php de animals.json\n";
    echo "Result is saved in output.txt in the script folder.\n";
    exit(1);
}

echo "Loading data from $argv[1]/$argv[2]...\n";

$data = json_decode(file_get_contents(sprintf('%s/../src/data/%s/%s', __DIR__, $argv[1], $argv[2])));

$text = '';
foreach ($data as $word => $stopWords) {
    $text .= sprintf("%s: %s\n", $word, implode(',', $stopWords));
}

echo "Saving data to output.txt...\n";

file_put_contents(__DIR__ . '/output.txt', $text);
