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
            $table->id();
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('course_outcome');
    }
}
