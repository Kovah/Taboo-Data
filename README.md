&nbsp;

# Taboo-Data

&nbsp;

![Current version](https://img.shields.io/github/release/kovah/taboo-data.svg?label=Latest%20Version) [![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/kovah/taboo-data/Testing/main?label=Build%20Status)](https://github.com/Kovah/Taboo-Data/actions) ![License](https://img.shields.io/github/license/Kovah/Taboo-Data.svg?label=License)

A data set for Taboo games. Plain JSON files which contain the keyword, and some buzzwords like in the original Taboo game. It was originally created for my [**Taboo browser game**](https://github.com/Kovah/Taboo).

Available languages: English, German

&nbsp;

## Data Structure

All lists are structured by using a key > value based approach. This means that the array keys contain  the keyword like `Bear` and the array values contain the buzzwords, like `Grizzly, Honey, Pooh`.

Instead of having to parse all entries like before, you can now decode the whole file contents and directly use all entries out of the box.

&nbsp;

## Usage

You can use the data set by [downloading it](https://github.com/Kovah/Taboo-Data/archive/master.zip) or use one of the following methods:

#### Javascript

```
npm install taboo-data
or
yarn add taboo-data
```

Here's an example on how to use the package with Javascript:

```javascript
import { TabooData } from 'taboo-data';

// Get all available languages, their categories and the category descriptions
const categories = TabooData.categories();

// Get the keywords for a specific category and language
const animals = await TabooData.getCategory('animals', 'de');
```

Please notice that importing the whole TabooData dataset will bloat your Javascript files as all entries from all categories are loaded.
To import single categories manually or asynchronously, you can call them on their own:

```javascript
import * as cars from 'taboo-data/src/data/de/cars';

const data = cars;
```


#### PHP

```
composer require kovah/taboo-data
```

Here's an example on how to use the package with PHP:

```php
<?php
use Kovah\TabooData;

$categories = TabooData::getCategories();

$cars = TabooData::getCategory('cars');
// or
$carsDE = TabooData::getCategory('cars', 'de');
```

&nbsp;

## Contributing

### Found a bug or typo? Have a feature request?

Please open a [new issue](https://github.com/Kovah/Taboo-Data/issues/new) and explain what's wrong or what needs to be improved.

### Words

To contribute words, just add them to the appropriate category and add at least 3-4 buzzwords.

&nbsp;

---

Taboo Data is a project by [Kevin Woblick](https://kovah.de) and [Contributors](https://github.com/Kovah/Taboo-Data/graphs/contributors)
