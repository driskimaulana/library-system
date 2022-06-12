<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\PengembalianModel;
use App\Models\PeminjamanModel;
use App\Models\BiblioModel;
use App\Models\KoleksiModel;
use App\Models\MemberModel;

class Home extends BaseController
{

    protected $pengembalianModel;
    protected $peminjamanModel;
    protected $biblioModel;
    protected $koleksiModel;
    protected $memberModel;
    protected $admin;

    public function __construct()
    {
        $this->pengembalianModel = new PengembalianModel();
        $this->peminjamanModel = new PeminjamanModel();
        $this->biblioModel = new BiblioModel();
        $this->koleksiModel = new KoleksiModel();
        $this->memberModel = new MemberModel();
        $auth = service('authentication');
        $this->admin = $auth->user();    
    }

    public function index()
    {
        $counts = array();
        $counts['biblio'] = $this->biblioModel->countAllResults();
        $counts['member'] = $this->memberModel->countAllResults();
        $counts['peminjaman'] = $this->peminjamanModel->countAllResults();
        $counts['pengembalian'] = $this->pengembalianModel->countAllResults(); 

        $data = [
            'title' => 'Home',
            'counts' => $counts,
            'user' => $this->admin,
            'tab' => 'Home'
        ];
        return view('index', $data);
    }
}
