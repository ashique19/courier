<?php

use Illuminate\Database\Seeder;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('settings')->insert([
            ['name' => 'application_name', 'value' => 'Epeon Courier Service'],
            ['name' => 'application_slogan', 'value' => 'We deliver business to person, from person to person.'],
            ['name' => 'logo_photo', 'value' => '/public/img/settings/epeon-logo.png'],
        ]);

    }
}
