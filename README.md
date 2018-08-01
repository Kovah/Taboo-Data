# Taboo-Data

A data set for Taboo games. Plain JSON files that contain parsable cards that contain the keyword
and some buzzwords like on the original Taboo game.


## Usage

You can use the data set by [downloading it](https://github.com/Kovah/Taboo-Data/archive/master.zip)
or as an NPM package by running the following command

```
npm install taboo-data
```

### Parsing

All lists contain entries that are parsable strings that are formatted like this:

* The key word comes first and ends with the vertical stoke (`|`).
* Buzzwords come after the vertical stoke and are delimited by colons (`:`).
* Buzzwords can contain any characters except `|` and `:`.
* Some keywords may also have no buzzwords and thus have no `|`.

```
Main Word|Buzzword 1:Buzzword, with sp3c!al char$ 2:Buzzword 3
```

#### Examples

**JavaScript**

```javascript
var card = {};

var split = wordString.split('|');
card.word = split[0];

if (typeof split[1] !== 'undefined') {
    card.buzzwords = split[1].split(':');
} else {
    card.buzzwords = [];
}
```


## Contributing

### Found a bug or typo? Have a feature request?

Please open a [new issue](https://github.com/Kovah/Taboo-Data/issues/new) and explain what's wrong
or what needs to be improved.

### Words

To contribute words, just add them to the appropriate category with the following scheme:

    Main Word|Buzzword 1:Buzzword, with sp3c!al char$ 2:Buzzword 3

Please notice that words cannot contain any of the following characters:

    Vertical stoke      |
    Double points       :
    Quotation marks     "
    Backslashes         \


---

Taboo Data is a project by [Kovah](https://kovah.de) | [Contributors](https://github.com/Kovah/Taboo-Data/graphs/contributors)
