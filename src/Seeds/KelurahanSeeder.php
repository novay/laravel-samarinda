<?php

namespace Novay\Samarinda\Seeds;

use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
    	$Csv = new CsvtoArray;
        $file = __DIR__. '/../../resources/csv/kelurahan.csv';
        $header = array('id', 'kecamatan_id', 'nama');
        $data = $Csv->csv_to_array($file, $header);
        $collection = collect($data);
        foreach($collection->chunk(50) as $chunk) {
            \DB::table(config('novay.samarinda.table_prefix') . 'kelurahan')->insert($chunk->toArray());
        }
    }

}
