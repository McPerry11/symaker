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
            $table->string('college');
            $table->string('courseTitle');
            $table->unsignedSmallInteger('lectureUnits');
            $table->unsignedSmallInteger('laboratoryUnits');
            $table->string('courseDescription');
            $table->string('preRequisite');
            $table->timestamps();

            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade');
            $table->foreign('preRequisite')->references('courseCode')->on('preRequisite')->onDelete('cascade');
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
