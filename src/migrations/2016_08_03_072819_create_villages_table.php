<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('novay.samarinda.table_prefix') . 'kelurahan', function(Blueprint $table)
        {
            $table->char('id', 10);
            $table->char('kecamatan_id', 7);
            $table->string('nama', 255);
            $table->primary('id');
            $table->foreign('kecamatan_id')->references('id')->on(config('novay.samarinda.table_prefix') . 'kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('novay.samarinda.table_prefix') . 'kelurahan');
    }
}
