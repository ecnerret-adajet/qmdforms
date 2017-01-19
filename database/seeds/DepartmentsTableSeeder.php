<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
          array('name'=>'Human Resource'),
          array('name'=>'Internal Audit'),
          array('name'=>'Purchasing'),
          array('name'=>'Sales'),
          array('name'=>'Marketing'),
          array('name'=>'QMD'),
          array('name'=>'QA'),
          array('name'=>'Information Technology'),
          array('name'=>'Accounting'),
          array('name'=>'Finance'),
          array('name'=>'Legal'),
          array('name'=>'Operations'),
        ]);
    }
}
