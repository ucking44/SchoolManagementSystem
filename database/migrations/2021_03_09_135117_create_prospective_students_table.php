<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectiveStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospective_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('gender');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('localOfOrigin');
            $table->string('stateOfOrigin');
            $table->string('country');
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
        Schema::dropIfExists('prospective_students');
    }
}
