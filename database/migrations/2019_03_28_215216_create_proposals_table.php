<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('period_id')->nullable(); 
            $table->foreign('period_id')->references('id')->on('periods');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('profsem_id')->nullable();
            $table->foreign('profsem_id')->references('id')->on('users');
            $table->unsignedInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');            
            $table->string('sercom')->nullable();
            $table->string('sercom_horas')->nullable();
            $table->unsignedInteger('research_line_id')->nullable();
            $table->foreign('research_line_id')->references('id')->on('research_lines');
            $table->string('titulo')->unique()->nullable();
            $table->text('planteamiento')->nullable();         
            $table->text('obj_general')->nullable();         
            $table->string('status');
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
        Schema::dropIfExists('proposals');
    }
}
