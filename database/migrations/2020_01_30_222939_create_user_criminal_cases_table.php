<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCriminalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_criminal_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('case_no')->nullable();
            $table->bigInteger('user_id');
            $table->string('type');
            $table->string('title');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('local_govt_id')->unsigned();
            $table->longText('description');
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
        Schema::dropIfExists('user_criminal_cases');
    }
}
