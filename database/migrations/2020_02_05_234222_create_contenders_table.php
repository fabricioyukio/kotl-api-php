<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateContendersTable extends Migration
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
            $table->enum('gender',['FEMALE','MALE','NOT GIVEN']);
            $table->uuid('token',36)->default(Uuid::uuid4());
            $table->enum('status',['CREATED','ACTIVE','SUSPENDED','CANCELLED']);
            $table->timestamps();
            $table->unique('email','one_contender_per_email');
            $table->index('token');
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
