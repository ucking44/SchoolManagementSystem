<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedulings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id');
            $table->bigInteger('level_id');
            $table->bigInteger('shift_id');
            $table->bigInteger('class_id');
            $table->bigInteger('classroom_id');
            $table->bigInteger('batch_id');
            $table->bigInteger('day_id');
            $table->bigInteger('time_id');
            //$table->bigInteger('teacher_id');
            $table->bigInteger('semester_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->default('disable');
            //$table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('class_schedulings');
    }
}
