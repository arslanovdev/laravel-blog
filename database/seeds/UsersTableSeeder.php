<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'     => 'Автор не известен',
                'email'    => 'unknown_author@gmail.com',
                'password' => bcrypt(str_random(16))
            ],
            [
                'name'     => 'Автор',
                'email'    => 'author@gmail.com',
                'password' => bcrypt('admin')
            ],
        ];

        DB::table('users')->insert($data);
    }
}
