# Taboo-Data

![Current version](https://img.shields.io/npm/v/taboo-data.svg) ![Downloads](https://img.shields.io/npm/dm/taboo-data.svg) ![License](https://img.shields.io/github/license/Kovah/Taboo-Data.svg)

A data set for Taboo games. Plain JSON files which contain the keyword
and some buzzwords like in the original Taboo game.


### Data Structure

All lists are structured by using a key > value based approach. This means that the array keys contain
the keyword like `Bär` and the array values contain the buzzwords, like `Grizzly, Honig, Pooh`.

Instead of having to parse all entries like before, you can now decode the whole file contents and directly
use all entries out of the box.


## Usage

You can use the data set by [downloading it](https://github.com/Kovah/Taboo-Data/archive/master.zip)
or as an NPM package by running the following command

```
npm install taboo-data --save
or
yarn add taboo-data
```

Taboo-Data provides helper classes you can use to quickly import the data into your
application. Here are examples on how to implement them.

**JavaScript**

```javascript
import TabooData from 'taboo-data';

const categories = TabooData.categories();
const animals = TabooData.getCategory('animals');
```

Please notice that importing the whole TabooData dataset will bloat your Javascript files as all entries from all
categories are loaded.
To import single categories manually or asynchronously, you can call them on their own:

```javascript
import { cars } from 'taboo-data/src/data/de/cars';

const data = cars;
```


**PHP**

```php

```



## Contributing

### Found a bug or typo? Have a feature request?

Please open a [new issue](https://github.com/Kovah/Taboo-Data/issues/new) and explain what's wrong
or what needs to be improved.

### Words

To contribute words, just add them to the appropriate category and add at least 3-4 buzzwords.


---

Taboo Data is a project by [Kovah](https://kovah.de) | [Contributors](https://github.com/Kovah/Taboo-Data/graphs/contributors)
