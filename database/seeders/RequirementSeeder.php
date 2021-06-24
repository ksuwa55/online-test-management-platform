<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requirements')->insert([[
            'title' => 'Test',
            'project_cd' => 'php',
            'requirement_cd' => 'req1',
            'description' => 'test'
        ],
        [
            'title' => 'Test2',
            'project_cd' => 'laravel',
            'requirement_cd' => 'req1',
            'description' => 'test2'
        ],
        ]
    );
    }
}
