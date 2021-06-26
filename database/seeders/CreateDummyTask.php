<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDummyTask extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            ['id'=>1, 'title'=>'Project #1', 'start'=>'2021-06-01', 
                'end'=>'2021-06-06', 'person_email'=>'123456@gmail.com', 'project_cd'=>'php'],
            ['id'=>2, 'title'=>'Task #1', 'start'=>'2021-06-06', 
                'end'=>'2021-06-08', 'person_email'=>'123456@gmail.com', 'project_cd'=>'php'],
            ['id'=>3, 'title'=>'Task #2', 'start'=>'2021-06-12', 
                'end'=>'2021-06-21', 'person_email'=>'123455@gmail.com', 'project_cd'=>'laravel'],
        ]);
    }
}
