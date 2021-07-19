<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admission_id');
            $table->string('username');
            //$table->string('gender');
            //$table->string('email')->unique();
            //$table->date('dob');
            //$table->string('phone');
            $table->string('image')->default('default.png');
            //$table->string('address');
            //$table->string('localOfOrigin');
            //$table->string('stateOfOrigin');
            //$table->string('country');
            $table->string('status')->default('disable');
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
        Schema::dropIfExists('students');
    }
}
