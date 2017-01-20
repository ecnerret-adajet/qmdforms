<?php

use Illuminate\Database\Seeder;

class NonconformitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nonconformities')->insert([
          array('name'=>'Customer-returns'),
          array('name'=>'Process-related'),
          array('name'=>'Contracted-service'),
          array('name'=>'Objectives not met'),
          array('name'=>'Vendor'),
          array('name'=>'Others')
        ]);
    }
}
