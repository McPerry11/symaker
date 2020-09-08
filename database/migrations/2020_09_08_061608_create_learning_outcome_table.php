<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_outcome', function (Blueprint $table) {
            $table->id('learningOutcomeID');
            $table->string('courseCode');
            $table->string('learningOutcomeName');
            $table->string('learningOutcomeDescription');
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
        Schema::dropIfExists('learning_outcome');
    }
}
