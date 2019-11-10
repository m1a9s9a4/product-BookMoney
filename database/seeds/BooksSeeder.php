<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 1,
            'title' => '5Gビジネス (日経文庫)',
            'publisher' => '日経文庫',
            'author' => '亀井卓也',
            'url' => 'https://www.amazon.co.jp/gp/product/4532114071?pf_rd_p=3d322af3-60ce-4778-b834-9b7ade73f617&pf_rd_r=0Z2GY2XTD2VRREGYVHNY',
            'image_url' => 'https://placehold.jp/150x150.png',
            'code' => '4532114071',
        ]);

        DB::table('books')->insert([
            'id' => 2,
            'title' => 'いちばんやさしいWordPressの教本 第4版 5.x対応 人気講師が教 える本格Webサイトの作り方 (「いちばんやさしい教本」シリーズ)',
            'publisher' => 'インプレス',
            'author' => '石川栄和',
            'url' => 'https://www.amazon.co.jp/gp/product/4532114071?pf_rd_p=3d322af3-60ce-4778-b834-9b7ade73f617&pf_rd_r=0Z2GY2XTD2VRREGYVHNY',
            'image_url' => 'https://placehold.jp/150x150.png',
            'code' => '4295006661',
        ]);
    }
}
