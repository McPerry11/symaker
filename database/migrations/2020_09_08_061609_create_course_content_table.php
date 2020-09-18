<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_content', function (Blueprint $table) {
            $table->id();
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('weeks');
            $table->integer('hours');
            $table->longText('topics');
            $table->longText('teachingLearningActivities');
            $table->longText('assessments');
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
        Schema::dropIfExists('course_content');
    }
}
