<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMulaiUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mulai_ujians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_group')->unsigned();
            $table->integer('id_kuis')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->string('pertemuan',5);
            $table->string('waktu',20);
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
        Schema::dropIfExists('mulai_ujian_models');
    }
}
