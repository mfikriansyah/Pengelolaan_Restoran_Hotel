<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldStokHidangans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hidangans', function (Blueprint $table) {
            $table->char("stok_hidangan", 3)->after("harga_hidangan")->default("50");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hidangans', function (Blueprint $table) {
            //
        });
    }
}
