<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [   'title' => 'オブジェクト指向でなぜつくるのか',
                'author' => '平澤章',
                'publish_date' => '2004-6-28',
                'page_count' => 365,
                'image_link' => "http://books.google.com/books/content?id=uZDvtgAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api",
                'status' => 'a'],
            [   'title' => '恋するコンピュータ',
                'author' => '黒川伊保子',
                'publish_date' => '1998-2-25',
                'page_count' => 205,
                'image_link' => "http://books.google.com/books/content?id=9PW4PQAACAAJ&printsec=frontcover&img=1&zoom=5&source=gbs_api",
                'status' => 'b'],
            [   'title' => 'マスタリングTCP/IP 入門編第5版',
                'author' => '竹下隆史,村山公保,荒井透',
                'publish_date' => '2012-02-01',
                'page_count' => 360,
                'image_link' => "http://books.google.com/books/content?id=KgyByBXNObUC&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api",
                'status' => 'c'],
            [   'title' => '体系的に学ぶ 安全なWebアプリケーションの作り方 第2版',
                'author' => '徳丸浩',
                'publish_date' => '2018-06-20',
                'page_count' => 688,
                'image_link' => "http://books.google.com/books/content?id=2H1gDwAAQBAJ&printsec=frontcover&img=1&zoom=5&edge=curl&source=gbs_api",
                'status' => 'c'],
        ];
        foreach($books as $book) {
            \App\Book::create($book);
        }
    }
}
