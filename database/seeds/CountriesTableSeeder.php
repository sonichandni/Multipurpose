<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('countries')->delete();
    	$countries = array(
			array('country_name' => 'India'),
			array('country_name' => 'United States'),
			array('country_name' => 'Canada'),
			array('country_name' => 'Afghanistan'),
			array('country_name' => 'Albania'),
			array('country_name' => 'Algeria'),
			array('country_name' => 'American Samoa'),
			array('country_name' => 'Andorra'),
			array('country_name' => 'Angola'),
			array('country_name' => 'Anguilla'),
			array('country_name' => 'Antarctica'),
		);
        DB::table('countries')->insert($countries);
    }
}
