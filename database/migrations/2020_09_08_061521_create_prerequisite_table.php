<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrerequisiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->string('courseCode');
            $table->string('prerequisites');
            $table->foreign('courseCode')->references('courseCode')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prerequisites')->references('courseCode')->on('courses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('prerequisite');
    }
}
