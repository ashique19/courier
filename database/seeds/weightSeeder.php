<?php

use Illuminate\Database\Seeder;

class weightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weights')->insert([
            ['name' => '0 - 500 Gm'],
            ['name' => '500 Gm - 1 Kg'],
            ['name' => '1 Kg - 3 Kg'],
            ['name' => '3 Kg - 5 Kg'],
            ['name' => '5 Kg - 10 Kg'],
        ]);
    }
}
