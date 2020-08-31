<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numAgence');
            $table->string('numCompte');
            $table->string('rib');
            $table->string('debutBlocage');
            $table->string('finBlocage');
            $table->integer('morals_id')->unsigned()->null();
            $table->integer('physiques_id')->unsigned()->null();
            $table->integer('typecomptes_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('morals_id')->references('id')->on('morals');
            $table->foreign('typecomptes_id')->references('id')->on('typecomptes');
            $table->foreign('physiques_id')->references('id')->on('physiques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comptes');
    }
}
