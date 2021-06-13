<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('question');
        $table->string('choice1');
        $table->string('choice2');
        $table->string('choice3');
        $table->string('choice4');
        $table->string('answer');

        $table->foreignId('quiz_id')->nullable()->constrained('quiz_infos');
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
        //
    }
}
