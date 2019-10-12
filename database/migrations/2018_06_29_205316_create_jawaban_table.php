<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kuis')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->integer('id_soal')->unsigned();
            $table->text('soal');
            $table->text('jawaban');
            $table->integer('pertemuan')->unsigned();
            $table->integer('bobot')->unsigned();
            $table->integer('nilai')->unsigned();
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
        Schema::dropIfExists('jawaban_models');
    }
}
