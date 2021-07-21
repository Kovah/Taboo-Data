<?php

// Fetch all countries from the restcountries.eu API
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://restcountries.eu/rest/v2/all',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "utf-8",
    CURLOPT_TIMEOUT => 10,
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $err ? 'Error: ' . $err : "Successfully fetched all countries.\n";

$countries = json_decode($response, true);

// Define translated regions and sub-regions
$regionsDe = [
    'Africa' => 'Afrika',
    'Americas' => 'Amerika',
    'Asia' => 'Asien',
    'Europe' => 'Europa',
    'Oceania' => 'Ozeanien',
];

$subregionsDe = [
    'Northern America' => 'Nordamerika',
    'South America' => 'Südamerika',
    'Central America' => 'Zentralamerika',
    'Caribbean' => 'Karibik',

    'Eastern Asia' => 'Ostasien',
    'South-Eastern Asia' => 'Südostasien',
    'Southern Asia' => 'Südasien',
    'Western Asia' => 'Westasien',
    'Central Asia' => 'Zentralasien',

    'Northern Africa' => 'Nordafrika',
    'Eastern Africa' => 'Ostafrika',
    'Southern Africa' => 'Südafrika',
    'Western Africa' => 'Westafrika',
    'Middle Africa' => 'Mittleres Afrika',

    'Northern Europe' => 'Nordeuropa',
    'Eastern Europe' => 'Osteuropa',
    'Southern Europe' => 'Südeuropa',
    'Western Europe' => 'Westeuropa',

    'Melanesia' => 'Melanesien',
    'Polynesia' => 'Polynesien',
    'Australia and New Zealand' => 'Australien & Neuseeland',
];

// Define some special data to merge into the dataset
$specialDataEN = [
    'China' => [
        'Hong Kong',
    ],
    'Denmark' => [
        'Lego',
    ],
    'Germany' => [
        'Munich',
        'Hamburg',
    ],
    'France' => [
        'Eiffel Tower',
    ],
    'Ukraine' => [
        'Chernobyl',
    ],
    'United Kingdom of Great Britain and Northern Ireland' => [
        'Wales',
        'Scotland',
    ],
    'United States of America' => [
        'New York',
        'Los Angeles',
    ],
];

$specialDataDE = [
    'China' => [
        'Hong Kong',
    ],
    'Deutschland' => [
        'München',
        'Hamburg',
    ],
    'Dänemark' => [
        'Lego',
    ],
    'Frankreich' => [
        'Eiffelturm',
    ],
    'Ukraine' => [
        'Tschernobyl',
    ],
    'Vereinigtes Königreich' => [
        'England',
        'Scotland',
    ],
    'Vereinigte Staaten von Amerika' => [
        'New York',
        'Los Angeles',
    ],
];

echo "Started building the country lists...\n";

$countryListDE = [];
$cityListDE = [];
$countryListEN = [];
$cityListEN = [];

// Loop through all countries and push them to the EN and DE lists
foreach ($countries as $country) {
    // Add English base version
    $cEN = $country['name'];
    if ($country['region']) {
        $countryListEN[$cEN][] = $country['region'];
    } else {
        $countryListEN[$cEN] = [];
    }

    if ($country['subregion']) {
        $countryListEN[$cEN][] = $country['subregion'];
    }

    if ($country['capital']) {
        $countryListEN[$cEN][] = $country['capital'];
        $cityEN = $country['capital'] . ' (' . $cEN . ')';
        $cityListEN[$cityEN] = [];

        if ($country['region']) {
            $cityListEN[$cityEN][] = $country['region'];
        }
    }

    // Add German translation
    $cDE = $country['translations']['de'];
    if ($cDE) {
        if ($country['region']) {
            $countryListDE[$cDE][] = $regionsDe[$country['region']] ?? $country['region'];
        } else {
            $countryListDE[$cDE] = [];
        }

        if ($country['subregion']) {
            $countryListDE[$cDE][] = $subregionsDe[$country['subregion']] ?? $country['subregion'];
        }

        if ($country['capital']) {
            $countryListDE[$cDE][] = $country['capital'];
            $cityDE = $country['capital'] . ' (' . $cDE . ')';
            $cityListDE[$cityDE] = [];

            if ($country['region']) {
                $cityListDE[$cityDE][] = $regionsDe[$country['region']] ?? $country['region'];
            }
        }
    }
}

// Merge cities into the country list
$countryListEN = array_merge($countryListEN, $cityListEN);
$countryListDE = array_merge($countryListDE, $cityListDE);

// Merge special data into the country list
$countryListEN = array_merge_recursive($countryListEN, $specialDataEN);
$countryListDE = array_merge_recursive($countryListDE, $specialDataDE);

// Save the new country lists to the dataset
file_put_contents(__DIR__ . '/../src/data/en/city-country.json', json_encode($countryListEN, JSON_UNESCAPED_UNICODE));
file_put_contents(__DIR__ . '/../src/data/de/city-country.json', json_encode($countryListDE, JSON_UNESCAPED_UNICODE));

echo 'Successfully built country lists from ' . count($countryListEN) . " countries and cities.\n";
