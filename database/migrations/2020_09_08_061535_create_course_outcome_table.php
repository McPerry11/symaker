<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_outcome', function (Blueprint $table) {
            $table->id('courseOutcomeID');
            $table->string('courseCode');
            $table->string('outcomeName');
            $table->string('courseDescription');
            $table->timestamps();

            $table->foreign('courseCode')->references('courseCode')->on('course_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_outcome');
    }
}
