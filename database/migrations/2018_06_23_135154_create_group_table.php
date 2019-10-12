<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id_group')->unsigned();
            $table->integer('noinduk')->unsigned();
            $table->string('judul');
            $table->string('slug');
            $table->text('deskripsi')->null();
            $table->string('pertemuan',20);
            $table->string('type',2);
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
        Schema::dropIfExists('group_models');
    }
}
