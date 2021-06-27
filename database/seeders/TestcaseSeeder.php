<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testcases')->insert([
            ['id'=>1, 'testcase_cd'=>'TC01', 'title'=>'Registration', 'project_cd'=>'php', 'requirement_cd'=>'Req01', 
            'status'=>'Not start', 'testdata'=>'data.xlsx', 'evidence'=>'evidence.xlsx'],
            ['id'=>2, 'testcase_cd'=>'TC02', 'title'=>'Login', 'project_cd'=>'php', 'requirement_cd'=>'Req01', 
            'status'=>'Not start', 'testdata'=>'data.xlsx', 'evidence'=>'evidence.xlsx'],
            ['id'=>3, 'testcase_cd'=>'TC01', 'title'=>'Registration', 'project_cd'=>'laravel', 'requirement_cd'=>'Req01', 
            'status'=>'Not start', 'testdata'=>'data.xlsx', 'evidence'=>'evidence.xlsx'],
        ]);
    }
}
