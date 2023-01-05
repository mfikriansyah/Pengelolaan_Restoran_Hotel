<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHidangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hidangan');
            $table->char('jenis_hidangan', 50);
            $table->string('deskripsi_hidangan');
            $table->char('gambar_hidangan', 150)->nullable();
            $table->integer('harga_hidangan');
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
        Schema::dropIfExists('hidangans');
    }
}
