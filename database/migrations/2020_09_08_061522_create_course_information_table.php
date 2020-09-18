<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_information', function (Blueprint $table) {
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('courseTitle');
            $table->unsignedSmallInteger('lectureUnits');
            $table->unsignedSmallInteger('laboratoryUnits');
            $table->longText('courseDescription');
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
        Schema::dropIfExists('course_information');
    }
}
