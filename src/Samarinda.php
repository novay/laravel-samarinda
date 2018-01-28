<?php

namespace Novay\Samarinda;

class Samarinda
{
    protected $search;

    public function search($location)
    {
        $this->search = strtoupper($location);

        return $this;
    }

    public function all()
    {
        $result = collect([]);

        if ($this->search) {
            $kecamatan = Models\Kecamatan::search($this->search)->get();
            $kelurahan = Models\Kelurahan::search($this->search)->get();
            $result->push($kecamatan);
            $result->push($kelurahan);
        }

        return $result->collapse();
    }

    public function allKecamatan()
    {
        if ($this->search) {
            return Models\Kecamatan::search($this->search)->get();
        }

        return Models\Kecamatan::all();
    }

    public function paginateKecamatan($numRows = 15)
    {
        if ($this->search) {
            return Models\Kecamatan::search($this->search)->paginate();
        }

        return Models\Kecamatan::paginate($numRows);
    }

    public function allKelurahan()
    {
        if ($this->search) {
            return Models\Kelurahan::search($this->search)->get();
        }

        return Models\Kelurahan::all();
    }

    public function paginateKelurahan($numRows = 15)
    {
        if ($this->search) {
            return Models\Kelurahan::search($this->search)->paginate();
        }

        return Models\Kelurahan::paginate($numRows);
    }

    public function findKecamatan($kecamatanId, $with = null)
    {
        $with = (array)$with;

        if ($with) {
            $kecamatan = Models\Kecamatan::with($with)->find($kecamatanId);
            return $kecamatan;
        }

        return Models\Kecamatan::find($kecamatanId);
    }

    public function findKelurahan($kelurahanId, $with = null)
    {
        $with = (array)$with;

        if ($with) {
            $kelurahan = Models\Kelurahan::with($with)->find($kelurahanId);
            return $kelurahan;
        }

        return Models\Kelurahan::find($kelurahanId);
    }

    private function loadRelation($object, $relation, $belongsTo = false)
    {
        $exploded = explode('.', $relation);
        $targetRelationName = end($exploded);

        $newObject = clone $object;

        $object->load([$relation => function ($q) use (&$createdValue, $belongsTo) {
            if ($belongsTo) {
                $createdValue = $q->first();
            } else {
                $createdValue = $q->get()->unique();
            }
        }]);

        $newObject[$targetRelationName] = $createdValue;

        return $newObject;
    }
}
