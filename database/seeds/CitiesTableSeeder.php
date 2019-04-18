<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
    	$cities = array(
			array('country_id' => '1','state_id' => '1','city_name' => 'Ahmedabad'),
			array('country_id' => '1','state_id' => '1','city_name' => 'Vadodara'),
			array('country_id' => '2','state_id' => '5','city_name' => 'Anchorage'),
			array('country_id' => '2','state_id' => '5','city_name' => 'Barrow')
		);
        DB::table('cities')->insert($cities);
    }
}
