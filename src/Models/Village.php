<?php

namespace Novay\Samarinda\Models;

class Kelurahan extends Model
{
	protected $table = 'kelurahan';

    public $timestamps = false;

	public function kecamatan()
	{
	    return $this->belongsTo('Novay\Samarinda\Models\Kecamatan', 'kecamatan_id');
	}

	public function getNamaAttribute()
    {
        return title_case($this->attributes['nama']);
    }

	public function getKecamatanNamaAttribute()
    {
        return title_case($this->kecamatan->nama);
    }
}
