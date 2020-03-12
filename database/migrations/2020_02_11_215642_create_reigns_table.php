<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('ruler_id');
            $table->enum('type',['DAY','WEEK']);
            $table->string('title', 120)->default('Rei do Sudeste');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->timestamps();
            $table->foreign('election_id')->references('id')->on('elections');
            $table->foreign('ruler_id')->references('id')->on('contenders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reigns');
    }
}
