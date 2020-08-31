<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoralsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomEmpl');
            $table->string('ninea');
            $table->string('rc');
            $table->string('adressEmpl');
            $table->string('raisonSocial');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('morals');
    }
}
