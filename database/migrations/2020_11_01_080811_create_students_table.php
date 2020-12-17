<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('s_fullname');
            $table->string('s_gender');
            $table->integer('s_stage');
            $table->boolean('s_state')->default(0);
            $table->unsignedBigInteger("s_department");
            $table->foreign('s_department')->references('id')->on('departments'); 
            $table->unsignedBigInteger("s_academic_year");
            $table->foreign('s_academic_year')->references('id')->on('years'); 
            $table->unsignedBigInteger("s_admin");
            $table->foreign('s_admin')->references('id')->on('users'); 
            $table->date('s_start_at');
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
        Schema::dropIfExists('students');
    }
}
