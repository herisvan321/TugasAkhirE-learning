<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->increments('id_materi');
            $table->integer('id_group')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('upload');
            $table->string('pertemuan',20);
            $table->text('coding');
            $table->string('status');
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
        Schema::dropIfExists('materi_models');
    }
}
