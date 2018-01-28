<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('novay.samarinda.table_prefix') . 'kecamatan', function(Blueprint $table)
        {
            $table->char('id', 7);
            $table->string('nama', 255);
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('novay.samarinda.table_prefix') . 'kecamatan');
    }
}
