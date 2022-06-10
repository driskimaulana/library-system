<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BiblioModel;
use App\Models\KoleksiModel;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;
    protected $biblioModel;
    protected $koleksiModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->biblioModel = new BiblioModel();
        $this->koleksiModel = new KoleksiModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_peminjaman') ? $this->request->getVar('page_peminjaman') : 1;

        if($this->request->getVar('keyword')){
            // dd($this->request->getVar('keyword'));
            $peminjaman = $this->peminjamanModel->search($this->request->getVar('keyword'));
            // $peminjaman = $this->peminjamanModel->getpeminjaman($this->request->get);
        }else{ 
            $peminjaman = $this->peminjamanModel;
        }

        // dd($peminjaman);

        $peminjamans = $peminjaman->paginate(10, 'biblio_peminjaman');

        $judul = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $judul[$i] = $this->biblioModel->getBiblio($k['buku_id'])['title'];
            $i++;
        }

        $data = [
            'title' => 'Daftar peminjaman',
            // 'peminjamans' => $peminjaman->paginate(10, 'biblio_peminjaman'),
            'peminjamans' => $peminjamans,
            'pager' => $peminjaman->pager,
            'currentPage' => $currentPage,
            'judul' => $judul,
            'tab' => 'peminjaman'
        ];

        return view('peminjaman/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->peminjamanModel->getpeminjaman($id)['title'],
            'peminjamans' => $this->peminjamanModel->getpeminjaman($id),
            'tab' => 'peminjaman'
        ];

        return view('peminjaman/detail', $data);
    }

    public function tambah($buku_id)
    {
        $data = [
            'title' => 'Tambah Peminjaman',
            'tab' => 'peminjaman',
            'biblio' => $this->biblioModel->getBiblio($buku_id),
            'validation' => \Config\Services::validation()
        ];

        return view('/peminjaman/tambah', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'nomorregistrasi' => [
                'rules' => 'required|is_unique[biblio_peminjaman.nomor_registrasi]',
                'errors' => [
                    'required' => "Nomor registrasi harus diisi",
                    'is_unique' => "Nomor registrasi sudah terdaftar"
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'max_size' => 'Lokasi lokasi harus diisi',
                    
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/peminjaman/tambah/' . $this->request->getVar('buku_id'))->withInput();
        }

        

        $this->peminjamanModel->save([
            'nomor_registrasi' => $this->request->getVar('nomorregistrasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'status' => 'Tersedia',
            'buku_id' => $this->request->getVar('buku_id')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/biblio/index');
    }

    public function pinjam($id)
    {
        $koleksi = $this->koleksiModel->getKoleksi($id);
        $data = [
            'title' => 'Pinjam Koleksi',
            'tab' => 'Peminjaman',
            'koleksi' => $koleksi,
            'validation' => \Config\Services::validation()
        ];

        return view('/peminjaman/pinjam_form', $data);
    }


}
