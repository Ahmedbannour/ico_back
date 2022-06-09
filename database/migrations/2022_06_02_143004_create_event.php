<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->bigInteger('id_bureau')->unsigned();
            $table->bigInteger('id_cat')->unsigned();
            $table->string('locale');
            $table->integer('nb_max');

            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('id_bureau')->references('id')->on('bureau');
            $table->foreign('id_cat')->references('id')->on('cat_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
