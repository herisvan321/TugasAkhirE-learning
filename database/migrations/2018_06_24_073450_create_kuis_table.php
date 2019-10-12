<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuiss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kuis')->unsigned();
            $table->integer('id_group')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->integer('pertemuan')->unsigned();
            $table->text('soal');
            $table->integer('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuis_models');
    }
}
