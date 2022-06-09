<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandePasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_passe', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_passe')->unsigned();
            $table->bigInteger('id_commande')->unsigned();
            // $table->timestamps();
        });

        Schema::table('commande_passe', function (Blueprint $table) {
            $table->foreign('id_passe')->references('id')->on('passe');
            $table->foreign('id_commande')->references('id')->on('commande');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_passe');
    }
}
