import { categories } from './data/categories';
import { animals } from './data/de/animals';
import { cars } from './data/de/cars';
import { cityCountry } from './data/de/city-country';

export default class TabooData {

  static categoryImports () {
    return {
      'animals': animals,
      'cars': cars,
      'cityCountry': cityCountry,
    };
  };

  static categories () {
    return categories;
  };

  static getCategory (category) {
    if (typeof this.categoryImports()[category] === 'undefined') {
      return null;
    }

    return this.categoryImports()[category];
  }
}
