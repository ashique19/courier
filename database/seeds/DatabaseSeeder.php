<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(settingSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(zoneSeeder::class);
        $this->call(areaSeeder::class);
        $this->call(weightSeeder::class);
        $this->call(statusSeeder::class);
    }
}
