<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_nilais', function (Blueprint $table) {
            $table->increments('id_all_nilai');
            $table->integer('noinduk')->unsigned();
            $table->integer('id_group')->unsigned();
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
        Schema::dropIfExists('all_nilais');
    }
}
