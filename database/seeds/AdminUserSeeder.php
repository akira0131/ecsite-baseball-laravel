<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => env('ADMIN_USER', "Admin"),
                'email' => env('ADMIN_EMAIL', "admin@example.com"),
                'password' => bcrypt(env('ADMIN_PWD', '123456')),
            ],
        ]);
    }
}
