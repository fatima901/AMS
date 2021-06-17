<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'department_name'=>'Customer Support'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'SEO'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'HR'
        ]);
        DB::table('departments')->insert([
            'department_name'=>'Coders'
        ]);
    }
}
