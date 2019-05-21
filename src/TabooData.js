import { categories } from './data/categories';
import { animals } from './data/de/animals';
import { cars } from './data/de/cars';
import { cityCountry } from './data/de/city-country';
import { food } from './data/de/food';
import { literature } from './data/de/literature';
import { people } from './data/de/people';
import { sports } from './data/de/sports';
import { things } from './data/de/things';
import { tv } from './data/de/tv';
import { web } from './data/de/web';

export default class TabooData {

  static categoryImports () {
    return {
      'animals': animals,
      'cars': cars,
      'cityCountry': cityCountry,
      'food': food,
      'literature': literature,
      'people': people,
      'sports': sports,
      'things': things,
      'tv': tv,
      'web': web,
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
