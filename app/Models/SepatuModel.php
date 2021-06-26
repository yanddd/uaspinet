<?php

namespace App\Models;

use CodeIgniter\Model;

class SepatuModel extends Model
{
    protected $table      = 'sepatu';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_sepatu', 'slug', 'jenis_sepatu', 'harga_sepatu', 'jumlah_sepatu', 'sampul'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getSepatu($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getBeli($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getBeliK($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('sepatu')->like('nama_sepatu', $keyword)->orLike('jenis_sepatu', $keyword);
    }
}
