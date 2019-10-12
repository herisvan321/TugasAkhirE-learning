<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudulKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judul_kuis', function (Blueprint $table) {
            $table->integer('id_kuis')->unsigned()->primary();
            $table->integer('id_group')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->string('judul');
            $table->string('waktu',20);
            $table->string('pertemuan');
            $table->string('jam',20);
            $table->string('menit',20);
            $table->string('jml_soal',20);
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
        Schema::dropIfExists('judul_kuis_models');
    }
}
