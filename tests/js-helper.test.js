import TabooData from './../src/TabooData';

test('get all categories', () => {
  const categories = TabooData.categories();

  expect(categories).toBeDefined();
  expect(categories.de.animals).toBeDefined();
  expect(categories.en.animals).toBeDefined();
});

test('get all categories for a language', () => {
  const categories = TabooData.categories('de');

  expect(categories.animals).toBeDefined();
});

test('get all categories for an invalid language', () => {
  expect(() => {
    TabooData.categories('fr');
  }).toThrowError('The language FR is not available.');
});

test('get one category', async () => {
  const category = await TabooData.getCategory('animals');
  expect(category).toBeDefined();
});

test('get one category from other language', async () => {
  const category = await TabooData.getCategory('animals', 'de');
  expect(category).toBeDefined();
});

test('get one invalid category', () => {
  expect(async () => {
    await TabooData.getCategory('foo-bar');
  }).rejects.toThrowError('Cannot find module \'./data/en/foo-bar.json\' from \'src/TabooData.js\'');
});

test('get one category with invalid language', () => {
  expect(async () => {
    await TabooData.getCategory('animals', 'fr');
  }).rejects.toThrowError('The language FR is not available.');
});
