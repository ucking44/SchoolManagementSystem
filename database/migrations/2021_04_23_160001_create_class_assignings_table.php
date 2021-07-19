<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAssigningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_assignings', function (Blueprint $table) {
            $table->bigIncrements('class_assign_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('class_schedule_id');
            $table->string('status')->default('disable');
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('class_schedule_id')->references('id')->on('class_schedulings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_assignings');
    }
}
