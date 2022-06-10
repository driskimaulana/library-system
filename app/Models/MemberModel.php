<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{

    protected $table      = 'member';
    protected $primaryKey = 'member_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;


    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected $allowedFields = ['member_id','nomor_membership', 'nama', 'email', 'telepon', 'alamat', 'created_at', 'img', 'status_membership', 'tanggal_lahir'];
    public function search($keyword){
        return $this->table('member')->like('nama', $keyword)->orLike('nomor_membership', $keyword);
    }

    public function getMember($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['member_id' => $id])->first();
    }
}