<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passe', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->bigInteger('id_event')->unsigned();
            $table->timestamps();
        });

        Schema::table('passe', function (Blueprint $table) {
            $table->foreign('id_event')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passe');
    }
}
