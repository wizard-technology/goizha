<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegree2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree2s', function (Blueprint $table) {
            $table->id();
            $table->integer("dg_degree_final_x2");
            $table->string("dg_degree_final_text_x2");
            $table->integer("dg_49_x2")->default(0);
            $table->integer("dg_bryar_x2")->default(0);
            $table->integer("dg_all_x2");
            $table->string("dg_all_text_x2");
            $table->unsignedBigInteger("dg_report_x2")->nullable();
            $table->unsignedBigInteger("dg_note_x2")->nullable();
            $table->unsignedBigInteger("dg_x1")->unique();
            $table->foreign('dg_x1')->references('id')->on('degrees'); 
            $table->unsignedBigInteger("dg_admin_x2");
            $table->foreign('dg_admin_x2')->references('id')->on('users'); 
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
        Schema::dropIfExists('degree2s');
    }
}
