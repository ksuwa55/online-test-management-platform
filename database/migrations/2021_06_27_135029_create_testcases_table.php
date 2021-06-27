<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testcases', function (Blueprint $table) {
            $table->id();
            $table->string('testcase_cd');
            $table->string('title');
            $table->string('project_cd');
            $table->string('requirement_cd');
            $table->enum('status', ['Not start', 'In progress', 'Pending', 'Completed'])->default('Not start');
            $table->string('testdata');
            $table->string('evidence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testcases');
    }
}
