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
            $table->string('king');
            $table->string('king_avatar');
            $table->string('arrogator');
            $table->string('arrogator_avatar');
            $table->enum('type',['DAY','WEEK']);
            $table->timestamps();
            $table->foreign('election_id')->references('id')->on('elections');
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
