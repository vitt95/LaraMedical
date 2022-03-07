/**
 * Indexed db
 */
import { openDB, deleteDB, wrap, unwrap } from "idb";

const testIndexedDb = async () => {
    const db = await openDB('laramedical', 1, {
        upgrade(db){
            const store = db.createObjectStore('articles', {
                keyPath: 'id',
                autoIncrement: true,
            });
            store.createIndex('date', 'date');
        }
    });

    // add an article

    await db.add('articles', {
        title: 'Article 1',
        date: new Date('2019-01-01'),
        body: 'my first article'
    });

    // add multiple articles
    const tx = db.transaction('articles', 'readwrite');
    await Promise.all([
      tx.store.add({
        title: 'Article 2',
        date: new Date('2019-01-01'),
        body: '…',
      }),
      tx.store.add({
        title: 'Article 3',
        date: new Date('2019-01-02'),
        body: '…',
      }),
      tx.done,
    ]);


    console.log(await db.getAllFromIndex('articles', 'date'));

    tx = db.transaction('articles', 'readwrite');
    const index = tx.store.index('date');

    for await (const cursor of index.iterate(new Date('2019-01-01'))) {
      const article = { ...cursor.value };
      article.body += ' And, happy new year!';
      cursor.update(article);
    }

    await tx.done;

}

export {
    testIndexedDb
}
