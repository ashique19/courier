<?php

use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Dev'],
            ['id' => 2, 'name' => 'Admin'],
            ['id' => 3, 'name' => 'Hub'],
            ['id' => 4, 'name' => 'Ground Team'],
            ['id' => 5, 'name' => 'Sender'],
        ]);
    }
}
