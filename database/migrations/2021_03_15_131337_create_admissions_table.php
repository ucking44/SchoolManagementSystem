<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('faculty_id');
            //$table->unsignedBigInteger('batch_id');
            $table->string('roll_no')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('gender');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('localOfOrigin');
            $table->string('stateOfOrigin');
            $table->string('country');
            $table->longText('current_address');
            $table->string('passport');
            $table->string('status')->default('disable');
            $table->date('dateregistered');
            $table->string('image')->default('default.png');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
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
        Schema::dropIfExists('admissions');
    }
}
