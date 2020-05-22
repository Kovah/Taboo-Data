import { categories } from './data/categories';
import * as animals from './data/de/animals.json';
import * as cars from './data/de/cars.json';
import * as cityCountry from './data/de/city-country.json';
import * as food from './data/de/food.json';
import * as literature from './data/de/literature.json';
import * as people from './data/de/people.json';
import * as sports from './data/de/sports.json';
import * as things from './data/de/things.json';
import * as tv from './data/de/tv.json';
import * as web from './data/de/web.json';

export class TabooData {

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
      'web': web
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
