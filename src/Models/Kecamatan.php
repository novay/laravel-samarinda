<?php

namespace Novay\Samarinda\Models;

class Kecamatan extends Model
{
	protected $table = 'kecamatan';

    public $timestamps = false;

	public function kelurahan()
    {
        return $this->hasMany('Novay\Samarinda\Models\Kelurahan', 'kecamatan_id');
    }

    public function getNamaAttribute()
    {
        return title_case($this->attributes['nama']);
    }
}
