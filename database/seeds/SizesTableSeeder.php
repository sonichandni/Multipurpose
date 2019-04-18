<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->delete();
    	$sizes = array(
			array('size' => 'S'),
			array('size' => 'M'),
			array('size' => 'L')
		);
        DB::table('sizes')->insert($sizes);
    }
}
