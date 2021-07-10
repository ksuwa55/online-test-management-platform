<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('project_cd');
            $table->string('email');
            $table->unique(['project_cd','email'], 'projectcd_email_unique');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['Administrator', 'Manager', 'Developer', 'Tester']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
