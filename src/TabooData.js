const categories = require('./data/categories.json');

const languages = ['de']

let data = {};

languages.forEach(language => {
  data[language] = {};
  categories[language].forEach(category => {
    data[language][category] = require(`.data/${language}/${category}.json`);
  })
});

export default class TabooData {

  static categories(language) {
    return categories[language];
  };

  static getCategory(category, language) {
    return data[language][category];
  }
}