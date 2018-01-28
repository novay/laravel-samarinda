<?php

namespace Novay\Samarinda\Models;

class Model extends \Illuminate\Database\Eloquent\Model
{
    function __construct()
    {
    	$this->table = config('novay.samarinda.table_prefix') . $this->table;
    }

    public function scopeSearch($query, $location)
    {
    	return $query->where('nama', 'like', '%'.$location.'%');
    }
}
