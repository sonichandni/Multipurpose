<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->delete();
    	$colors = array(
			array('name' => 'Black'),
			array('name' => 'White'),
			array('name' => 'Blue'),
			array('name' => 'Red'),
		);
        DB::table('colors')->insert($colors);
    }
}
