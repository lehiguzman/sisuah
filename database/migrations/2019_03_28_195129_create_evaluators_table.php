<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluators', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique(); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('asesor_academico'); 
            $table->foreign('asesor_academico')->references('id')->on('users');
            $table->unsignedInteger('evaluator_1'); 
            $table->foreign('evaluator_1')->references('id')->on('users');
            $table->unsignedInteger('evaluator_2')->nullable(); 
            $table->foreign('evaluator_2')->references('id')->on('users');
            $table->unsignedInteger('evaluator_3')->nullable(); 
            $table->foreign('evaluator_3')->references('id')->on('users');
            $table->unsignedInteger('evaluator_4')->nullable(); 
            $table->foreign('evaluator_4')->references('id')->on('users');
            $table->text('observacion')->nullable(); 
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
        Schema::dropIfExists('evaluators');
    }
}
