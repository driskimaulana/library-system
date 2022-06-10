<?php

namespace App\Models;

use CodeIgniter\Model;

class BiblioModel extends Model
{

    protected $table      = 'biblio';
    protected $primaryKey = 'buku_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul', 'created_at', 'updated_at'];
    public function search($keyword){
        return $this->table('biblio')->like('title', $keyword)->orLike('authors', $keyword)->orLike('publisher', $keyword);
    }

    public function getBiblio($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['buku_id' => $id])->first();
    }
}