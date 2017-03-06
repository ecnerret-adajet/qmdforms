<?php

use Illuminate\Database\Seeder;

class DdrdistributionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('ddrdistributions')->insert([
        		array('name' => 'Relevant external doc.(controll copy)'),
        		array('name' => 'Customer request (uncontroll copy)'),
        		array('name' => 'Others'),
        	]);
    }
}
