<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'user_id'=>'1',
            'account_name'=>'Admin Account',
            'account_number'=>'023456889',
            'bank_name'=>'HBL Bank',
            'basic_salary'=>'30000',
            'total_salary'=>'26000'

        ]);

        DB::table('accounts')->insert([
            'user_id'=>'2',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);

        DB::table('accounts')->insert([
            'user_id'=>'3',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);DB::table('accounts')->insert([
        'user_id'=>'4',
        'account_name'=>'Employee Account',
        'account_number'=>'02345982389',
        'bank_name'=>'AL Bank',
        'basic_salary'=>'40000',
        'total_salary'=>'40000'
    ]);
        DB::table('accounts')->insert([
            'user_id'=>'5',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'6',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'7',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'8',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'9',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'10',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'11',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
        DB::table('accounts')->insert([
            'user_id'=>'12',
            'account_name'=>'Employee Account',
            'account_number'=>'02345982389',
            'bank_name'=>'AL Bank',
            'basic_salary'=>'40000',
            'total_salary'=>'40000'
        ]);
    }
}
