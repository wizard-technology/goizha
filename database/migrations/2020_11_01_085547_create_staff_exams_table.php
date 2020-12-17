<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_exams', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("se_semester");
            $table->tinyInteger("se_round");
            $table->unsignedBigInteger("se_staff");
            $table->foreign('se_staff')->references('id')->on('staff');
            $table->unsignedBigInteger("se_academic_year");
            $table->foreign('se_academic_year')->references('id')->on('years');
            $table->unsignedBigInteger("se_admin");
            $table->foreign('se_admin')->references('id')->on('users');
            $table->timestamps();
            $table->unique(['se_semester', 'se_round', 'se_staff', 'se_academic_year'],'unique_4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_exams');
    }
}
