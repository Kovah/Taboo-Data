import * as categories from './data/categories.json';

const availableLanguages = [
  'en', 'de'
];

export default class TabooData {

  /**
   * Get all categories, or all categories of a specific language.
   * Does not include the actual keywords.
   *
   * @param language Either null or String
   * @return Object
   */
  static categories (language = '') {
    if (language.length > 0) {
      if (!availableLanguages.find(l => l === language)) {
        throw new Error(`The language ${language.toUpperCase()} is not available.`);
      }

      return categories.default[language];
    }

    return categories.default;
  };

  /**
   * Get the keywords of a specific category for a specific language.
   *
   * @param category
   * @param language
   * @return Object
   */
  static async getCategory (category, language = 'en') {
    if (!availableLanguages.find(l => l === language)) {
      throw new Error(`The language ${language.toUpperCase()} is not available.`);
    }

    return await import(`./data/${language}/${category}.json`).then(data => data.default);
  }
}
