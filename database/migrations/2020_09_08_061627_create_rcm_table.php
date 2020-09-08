<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcm', function (Blueprint $table) {
            $table->string('courseCode');
            $table->string('textbook');
            $table->string('otherReferences');
            $table->string('gradingSystem');
            $table->string('courseRequirements');
            $table->string('classroomPolicy');
            $table->string('consultationHours');
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
        Schema::dropIfExists('rcm');
    }
}
