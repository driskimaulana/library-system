<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{

    protected $table      = 'pengembalian';
    protected $primaryKey = 'pengembalian_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected $allowedFields = ['pengembalian_id', 'buku_id', 'peminjaman_id', 'admin_id', 'kondisi_buku', 'denda', 'created_at', 'tanggal_kembali', 'catatan', 'nomor_peminjaman'];
    public function search($keyword){
        return $this->table('pengembalian')->like('peminjaman_id', $keyword)->orLike('member_id', $keyword)->orLike('buku_id', $keyword)->orLike('koleksi_id', $keyword)->orLike('nomor_peminjaman', $keyword);
    }

    public function getPengembalian($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['pengembalian_id' => $id])->first();
    }
}