<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNullableTestdataAndEvidenceInTestdatatable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testcases', function (Blueprint $table) {
            $table->string('testdata')->nullable()->change();
            $table->string('evidence')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testcases', function (Blueprint $table) {
            Schema::drop('testcases');
        });
    }
}
