<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
          array('name'=>'Proposed'),
          array('name'=>'Existing Document'),
          array('name'=>'Cancellation')
        ]);
    }
}
