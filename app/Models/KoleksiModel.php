<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{

    protected $table      = 'biblio_koleksi';
    protected $primaryKey = 'koleksi_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected $allowedFields = ['koleksi_id', 'nomor_registrasi', 'lokasi', 'status', 'buku_id'];
    public function search($keyword){
        return $this->table('biblio_koleksi')->like('nomor_registrasi', $keyword);
    }

    public function getKoleksi($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['koleksi_id' => $id])->first();
    }
}