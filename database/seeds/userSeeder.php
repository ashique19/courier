<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@epeon.com',
                'role_id' => 2,
                'password' => bcrypt(1234)
            ],
        ]);
    }
}
