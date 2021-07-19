<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolls', function (Blueprint $table) {
            $table->bigIncrements('roll_id');
            $table->unsignedBigInteger('student_id');
            $table->string('username');
            $table->string('password');
            $table->dateTime('login_time')->nullable();
            $table->dateTime('logout_time')->nullable();
            $table->integer('isonline')->default(0);
            $table->integer('ip_address')->default(0);
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
        Schema::dropIfExists('rolls');
    }
}
