<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepesans', function (Blueprint $table) {
            $table->integer('id_pesan')->unsigned();
            $table->integer('id_noinduk_1')->unsigned();
            $table->integer('id_noinduk_2')->unsigned();
            $table->integer('jumlah1')->unsigned();
            $table->integer('jumlah2')->unsigned();
            $table->text('pesan_terakhir');
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
        Schema::dropIfExists('homepesans');
    }
}
