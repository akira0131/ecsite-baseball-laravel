<?php

use Illuminate\Database\Seeder;

class WikisTableSeeder extends Seeder
{
    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('wikis')->insert([
            [
                'title' => 'ブック１',
                'body' => '著者１',
            ],
            [
                'title' => 'ブック２',
                'body' => '著者２',
            ],
            [
                'title' => 'ブック３',
                'body' => '著者３',
            ],
        ]);
    }
}
