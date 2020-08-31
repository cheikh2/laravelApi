<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('montant');
            $table->integer('comptes_id')->unsigned();
            $table->integer('operationtypes_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('comptes_id')->references('id')->on('comptes');
            $table->foreign('operationtypes_id')->references('id')->on('operationtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operations');
    }
}
