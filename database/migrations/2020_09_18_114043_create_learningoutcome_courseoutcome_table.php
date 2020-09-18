<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningoutcomeCourseoutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learningoutcome_courseoutcome', function (Blueprint $table) {
            $table->foreignId('learingOutcomeID')->constrained('learning_outcome')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('courseOutcomeID')->constrained('course_outcome')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('learningoutcome_courseoutcome');
    }
}
