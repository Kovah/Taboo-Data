<?php
if (!isset($argv[1], $argv[2], $argv[3])) {
    echo "Script usage:\n";
    echo "text-to-json.php [source file] [language]  [destination file]\n";
    echo "Example: text-to-json.php data.txt de animals.json\n";
    echo "Source file is read from the script file directory.\n";
    exit(1);
}

echo "Loading data from $argv[1]...\n";

$data = file_get_contents(sprintf('%s/%s', __DIR__, $argv[1]));
$newData = [];

$lines = explode("\n", $data);
foreach ($lines as $line) {
    if (empty($line)) {
        continue;
    }

    $lineData = explode(':', $line);
    $keyword = trim($lineData[0]);
    $stopWords = explode(',', trim($lineData[1]));
    $newData[$keyword] = $stopWords;
}

echo "Saving data to $argv[2]/$argv[3]...\n";

file_put_contents(
    sprintf('%s/../src/data/%s/%s', __DIR__, $argv[2], $argv[3]),
    json_encode($newData, JSON_UNESCAPED_UNICODE)
);
