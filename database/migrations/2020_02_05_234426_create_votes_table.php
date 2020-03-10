<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('contender_id');
            $table->string('voter_email',120);
            $table->enum('status',['UNCONFIRMED','CONFIRMED','ACCOUNTED','REJECTED'])->default('UNCONFIRMED');
            $table->timestamps();
            $table->foreign('election_id')->references('id')->on('elections');
            $table->foreign('contender_id')->references('id')->on('contenders');
            $table->unique(['voter_email','election_id'],'one_email_one_vote_per_election');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
