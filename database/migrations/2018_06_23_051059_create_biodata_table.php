<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->integer('noinduk')->primary();
            $table->string('namadepan');
            $table->string('namabelakang')->null();
            $table->string('email');
            $table->string('jenkel');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->string('nohp',20);
            $table->text('alamat');
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
        Schema::dropIfExists('biodata_models');
    }
}
