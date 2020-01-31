<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('local_govt_id')->unsigned();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('age');
            $table->string('gender');
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
            $table->foreign('local_govt_id')->references('id')->on('local_govts')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
