<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_length');
            $table->string('uniqueid');
            $table->string('time');
            $table->foreignID('instructor_id')->nullable()->constrained('instructors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignID('course_id')->nullable()->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('quiz_infos');
    }
}