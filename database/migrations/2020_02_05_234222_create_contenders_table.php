<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',120);
            $table->string('name',60);
            $table->string('token',60);
            $table->enum('status',['CREATED','ACTIVE','SUSPENDED','BANNED']);
            $table->timestamps();
            $table->unique('email','one_contender_per_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
