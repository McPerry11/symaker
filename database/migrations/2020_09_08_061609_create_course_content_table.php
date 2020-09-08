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
            $table->id('courseContentID');
            $table->string('courseCode');
            $table->foreignId('learningOutcome')->references('learningOutcomeID')->on('learning_outcome')->onDelete('cascade');
            $table->string('weeks');
            $table->string('hours');
            $table->string('topics');
            $table->string('teachingLearningActivities');
            $table->string('assessments');
            $table->timestamps();
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade');
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
