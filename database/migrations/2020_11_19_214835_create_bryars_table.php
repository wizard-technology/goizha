<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBryarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bryars', function (Blueprint $table) {
            $table->id();
            $table->integer("br_limit");
            $table->unsignedBigInteger("br_department");
            $table->unsignedBigInteger("br_year");
            $table->tinyInteger("br_semester");
            $table->tinyInteger("br_round");
            $table->tinyInteger("br_stage");
            $table->foreign('br_year')->references('id')->on('years'); 
            $table->foreign('br_department')->references('id')->on('departments'); 
            $table->timestamps();
            $table->unique(['br_department', 'br_year', 'br_semester', 'br_round','br_stage'],'unique_all');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bryars');
    }
}
