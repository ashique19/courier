<?php

use Illuminate\Database\Seeder;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name' => 'Pickup Pending'],
            ['name' => 'Picked Up'],
            ['name' => 'At Sorting'],
            ['name' => 'Delivery in Progress'],
            ['name' => 'Delivered'],
            ['name' => 'On Hold'],
            ['name' => 'Marked for Return'],
            ['name' => 'Return in Progress'],
            ['name' => 'Return Complete'],
        ]);
    }
}
