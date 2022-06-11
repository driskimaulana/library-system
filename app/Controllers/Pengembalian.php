<?php

namespace App\Controllers;

use App\Models\PengembalianModel;
use App\Models\PeminjamanModel;
use App\Models\BiblioModel;
use App\Models\KoleksiModel;
use App\Models\MemberModel;

class pengembalian extends BaseController
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

        $currentPage = $this->request->getVar('page_pengembalian') ? $this->request->getVar('page_pengembalian') : 1;

        if($this->request->getVar('keyword')){
            // dd($this->request->getVar('keyword'));
            $pengembalian = $this->pengembalianModel->search($this->request->getVar('keyword'));
            // $pengembalian = $this->pengembalianModel->getpengembalian($this->request->get);
        }else{ 
            $pengembalian = $this->pengembalianModel;
        }

        // dd($pengembalian);

        $pengembalians = $pengembalian->paginate(10, 'pengembalian');

        $judul = array();
        $i = 0;
        foreach ($pengembalians as $k) {
            $judul[$i] = $this->biblioModel->getBiblio($k['buku_id'])['title'];
            $i++;
        }
        

        $data = [
            'title' => 'Daftar pengembalian',
            'pengembalians' => $pengembalians,
            'admin' => $this->admin,
            'pager' => $pengembalian->pager,
            'currentPage' => $currentPage,
            'judul' => $judul,
            'tab' => 'Pengembalian'
        ];

        return view('pengembalian/index', $data);
    }

    public function form_pengembalian($id)
    {

        $peminjaman = $this->peminjamanModel->getPeminjaman($id);

        $biblio = $this->biblioModel->getBiblio($peminjaman['buku_id']);

        $data = [
            'title' => 'Form Pengembalian',
            'peminjaman' => $peminjaman,
            'biblio' => $biblio,
            'admin' => $this->admin,
            'pengembalians' => $this->pengembalianModel->getpengembalian($id),
            'tab' => 'Pengembalian',
            'validation' => \Config\Services::validation()
        ];

        return view('pengembalian/form_pengembalian', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->pengembalianModel->getpengembalian($id)['title'],
            'pengembalians' => $this->pengembalianModel->getpengembalian($id),
            'tab' => 'pengembalian'
        ];

        return view('pengembalian/detail', $data);
    }

    public function tambah($buku_id)
    {
        $data = [
            'title' => 'Tambah pengembalian',
            'tab' => 'pengembalian',
            'biblio' => $this->biblioModel->getBiblio($buku_id),
            'validation' => \Config\Services::validation()
        ];

        return view('/pengembalian/pinjam_form', $data);
    }

    
    public function save()
    {

        // validasi input
        if(!$this->validate([
            'kondisi-buku' => [
                'rules' => 'required',
            ],
            'tanggal-kembali' => [
                'rules' => 'required',
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pengembalian/form_pengembalian/' . $this->request->getVar('peminjaman-id'))->withInput();
        }

        $peminjaman = $this->peminjamanModel->getPeminjaman($this->request->getVar('peminjaman-id'));

        $koleksi = $this->koleksiModel->getKoleksi($peminjaman['koleksi_id']);
                
        $this->pengembalianModel->save([
            'peminjaman_id' => $this->request->getVar('peminjaman-id'),
            'buku_id' => $this->request->getVar('biblio-id'),
            'nomor_peminjaman' => $peminjaman['nomor_peminjaman'],
            'admin_id' => $this->request->getVar('admin-id'),
            'kondisi_buku' => $this->request->getVar('kondisi-buku'),
            'denda' => $this->request->getVar('denda'),
            'tanggal_kembali' => $this->request->getVar('tanggal-kembali'),
            'catatan' => $this->request->getVar('catatan'),
        ]);
        
        $this->koleksiModel->save([
            'koleksi_id' => $koleksi['koleksi_id'],
            'status' => 'Tersedia'
        ]);

        $this->peminjamanModel->save([
            'peminjaman_id' => $this->request->getVar('peminjaman-id'),
            'status' => 'Dikembalikan'
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/pengembalian/index/');
    }

    public function pinjam($id)
    {
        $koleksi = $this->koleksiModel->getKoleksi($id);
        $data = [
            'title' => 'Pinjam Koleksi',
            'tab' => 'pengembalian',
            'koleksi' => $koleksi,
            'validation' => \Config\Services::validation()
        ];

        return view('/pengembalian/pinjam_form', $data);
    }


}
