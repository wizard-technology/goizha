<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("dg_student");
            $table->unsignedBigInteger("dg_course");
            $table->unsignedBigInteger("dg_year");
            $table->tinyInteger("dg_semester");
            $table->tinyInteger("dg_stage");
            $table->integer("dg_degree_tekra");
            $table->string("dg_degree_tekra_text");
            $table->integer("dg_degree_final_x1")->default(0);
            $table->string("dg_degree_final_text_x1")->nullable();
            $table->tinyInteger("dg_49_x1")->default(0);
            $table->integer("dg_bryar_x1")->default(0);
            $table->integer("dg_all_x1")->default(0);
            $table->string("dg_all_text_x1")->nullable();
            $table->unsignedBigInteger("dg_report_x1")->nullable();
            $table->unsignedBigInteger("dg_note_x1")->nullable();
            $table->foreign('dg_student')->references('id')->on('students');
            $table->foreign('dg_course')->references('id')->on('courses'); 
            $table->foreign('dg_year')->references('id')->on('years');
            $table->unsignedBigInteger("dg_department");
            $table->foreign('dg_department')->references('id')->on('departments'); 
            $table->unsignedBigInteger("dg_admin");
            $table->foreign('dg_admin')->references('id')->on('users'); 
            $table->timestamps();

            $table->unique(['dg_student', 'dg_course', 'dg_year', 'dg_semester','dg_stage'],'unique_5');

        });
        // php artisan migrate:fresh
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
