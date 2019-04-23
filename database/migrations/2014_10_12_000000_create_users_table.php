<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->integer('tipo');
            $table->integer('nivest')->nullable();
            $table->unsignedInteger('subject_id')->nullable(); 
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedInteger('section_id')->nullable(); 
            $table->string('avatar')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->string('password');
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
