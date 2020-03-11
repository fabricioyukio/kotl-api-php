<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('status',['CREATED','SKIPPED','OPEN','CLOSED'])->default('CREATED');
            $table->enum('type',['DAILY','WEEKLY'])->default('DAILY');
            $table->date('available_at');
            $table->datetime('started_at')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->unique(['type','available_at'],'one_election_per_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elections');
    }
}
