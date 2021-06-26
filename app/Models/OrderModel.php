<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'nama_sepatu', 'harga_sepatu', 'nama_pembeli', 'alamat_pembeli', 'total', 'jumlah_sepatu', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getOrder($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function search($keyword)
    {
        return $this->table('penjualan')->like('nama_pembeli', $keyword)->orLike('alamat_pembeli', $keyword)->orLike('nama_sepatu', $keyword);
    }
}
