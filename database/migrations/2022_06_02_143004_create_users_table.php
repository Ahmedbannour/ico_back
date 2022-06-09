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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('tel')->nullable();
            $table->string('image')->nullable();
            $table->date('date_naissance')->nullable();
            $table->boolean('etat')->nullable();
            $table->boolean('activation')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->bigInteger('id_bureau')->unsigned();
            $table->rememberToken();
            $table->timestamps();


        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_bureau')->references('id')->on('bureau');

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
