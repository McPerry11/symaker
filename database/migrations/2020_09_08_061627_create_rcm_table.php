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
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade');
            $table->longText('textbook');
            $table->longText('otherReferences');
            $table->longText('gradingSystem');
            $table->longText('courseRequirements');
            $table->longText('classroomPolicy');
            $table->longText('consultationHours');
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
        Schema::dropIfExists('rcm');
    }
}
