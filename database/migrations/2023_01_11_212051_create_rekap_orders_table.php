<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_orders', function (Blueprint $table) {
            $table->id();
            $table->char('no_kamar', 9);
            $table->char('status_order', 7);
            $table->char('nama_hidangan', 255);
            $table->decimal('total_harga');
            $table->char('email', 50);
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
        Schema::dropIfExists('rekap_orders');
    }
}
