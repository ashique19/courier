<?php

use Illuminate\Database\Seeder;

class zoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            ['name' => 'Dhaka City'],
            ['name' => 'Dhaka Suburbs'],
            ['name' => 'Outside Dhaka'],
        ]);
    }
}
