<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('card_number');
            $table->double('card_month');
            $table->double('card_year');
            $table->double('ccv');
            $table->string('card_name');
            // $table->foreignId('course_id')->nullable()->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('enrolls');
    }
}
