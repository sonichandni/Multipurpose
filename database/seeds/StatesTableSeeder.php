<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();
    	$states = array(
			array('country_id' => '1','state_name' => 'Gujarat'),
			array('country_id' => '1','state_name' => 'Andra Pradesh'),
			array('country_id' => '1','state_name' => 'Goa'),
			array('country_id' => '2','state_name' => 'Alabama'),
			array('country_id' => '2','state_name' => 'Alaska'),
			array('country_id' => '2','state_name' => 'Arizona')
		);
        DB::table('states')->insert($states);
    }
}
