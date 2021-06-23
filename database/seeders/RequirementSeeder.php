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
        DB::table('requirements')->insert([
            'title' => 'Test',
            'project_cd' => 'php',
            'description' => 'test'
        ]);
    }
}
