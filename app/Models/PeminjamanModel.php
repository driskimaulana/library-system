<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{

    protected $table      = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected $allowedFields = ['peminjaman_id', 'buku_id', 'member_id', 'koleksi_id', 'admin_id', 'tanggal_pinjam', 'batas_kembali', 'status', 'nomor_peminjaman'];
    public function search($keyword){
        return $this->table('peminjaman')->like('peminjaman_id', $keyword)->orLike('member_id', $keyword)->orLike('buku_id', $keyword)->orLike('koleksi_id', $keyword)->orLike('nomor_peminjaman', $keyword);
    }

    public function getAllPeminjaman($id)
    {
        return $this->where(['member_id' => $id]);
    }

    public function getPeminjaman($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['peminjaman_id' => $id])->first();
    }
}