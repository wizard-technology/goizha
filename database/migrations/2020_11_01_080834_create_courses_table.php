<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("c_name");
            $table->tinyInteger("c_stage");
            $table->float("c_unit");
            $table->tinyInteger("c_semester");
            $table->tinyInteger("c_weight")->default('0');
            $table->unsignedBigInteger("c_department");
            $table->foreign('c_department')->references('id')->on('departments'); 
            $table->unsignedBigInteger("c_admin");
            $table->foreign('c_admin')->references('id')->on('users'); 
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
        Schema::dropIfExists('courses');
    }
}
