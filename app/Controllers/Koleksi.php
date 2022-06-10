<?php

namespace App\Controllers;

use App\Models\KoleksiModel;
use App\Models\BiblioModel;

class Koleksi extends BaseController
{
    protected $koleksiModel;
    protected $biblioModel;

    public function __construct()
    {
        $this->koleksiModel = new KoleksiModel();
        $this->biblioModel = new BiblioModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_koleksi') ? $this->request->getVar('page_koleksi') : 1;

        if($this->request->getVar('keyword')){
            // dd($this->request->getVar('keyword'));
            $koleksi = $this->koleksiModel->search($this->request->getVar('keyword'));
            // $koleksi = $this->koleksiModel->getKoleksi($this->request->get);
        }else{ 
            $koleksi = $this->koleksiModel;
        }

        // dd($koleksi);

        $koleksis = $koleksi->paginate(10, 'biblio_koleksi');

        $judul = array();
        $i = 0;
        foreach ($koleksis as $k) {
            $judul[$i] = $this->biblioModel->getBiblio($k['buku_id'])['title'];
            $i++;
        }

        $data = [
            'title' => 'Daftar Koleksi',
            // 'koleksis' => $koleksi->paginate(10, 'biblio_koleksi'),
            'koleksis' => $koleksis,
            'pager' => $koleksi->pager,
            'currentPage' => $currentPage,
            'judul' => $judul,
            'tab' => 'Koleksi'
        ];

        return view('koleksi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->koleksiModel->getkoleksi($id)['title'],
            'koleksis' => $this->koleksiModel->getkoleksi($id),
            'tab' => 'koleksi'
        ];

        return view('koleksi/detail', $data);
    }

    public function tambah($buku_id)
    {
        $data = [
            'title' => 'Tambah Koleksi',
            'tab' => 'Koleksi',
            'biblio' => $this->biblioModel->getBiblio($buku_id),
            'validation' => \Config\Services::validation()
        ];

        return view('/koleksi/tambah', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'nomorregistrasi' => [
                'rules' => 'required|is_unique[biblio_koleksi.nomor_registrasi]',
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
            return redirect()->to('/koleksi/tambah/' . $this->request->getVar('buku_id'))->withInput();
        }

        

        $this->koleksiModel->save([
            'nomor_registrasi' => $this->request->getVar('nomorregistrasi'),
            'lokasi' => $this->request->getVar('lokasi'),
            'status' => 'Tersedia',
            'buku_id' => $this->request->getVar('buku_id')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/biblio/index');
    }


}
