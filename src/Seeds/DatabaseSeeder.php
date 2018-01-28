<?php

namespace Novay\Samarinda\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clear_data();

        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);
    }

    function clear_data(){
        \DB::table(config('novay.samarinda.table_prefix') . 'kelurahan')->delete();
        \DB::table(config('novay.samarinda.table_prefix') . 'kecamatan')->delete();
    }
}


