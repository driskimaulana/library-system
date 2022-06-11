<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BiblioModel;
use App\Models\KoleksiModel;
use App\Models\MemberModel;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;
    protected $biblioModel;
    protected $koleksiModel;
    protected $memberModel;
    protected $admin;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->biblioModel = new BiblioModel();
        $this->koleksiModel = new KoleksiModel();
        $this->memberModel = new MemberModel();
        $auth = service('authentication');
        $this->admin = $auth->user();    
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

        $peminjamans = $peminjaman->paginate(10, 'peminjaman');

        $judul = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $judul[$i] = $this->biblioModel->getBiblio($k['buku_id'])['title'];
            $i++;
        }
        $member = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $member[$i] = $this->memberModel->getMember($k['member_id'])['nomor_membership'];
            $i++;
        }
        $koleksi = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $koleksi[$i] = $this->koleksiModel->getKoleksi($k['koleksi_id'])['nomor_registrasi'];
            $i++;
        }

        

        $data = [
            'title' => 'Daftar peminjaman',
            // 'peminjamans' => $peminjaman->paginate(10, 'biblio_peminjaman'),
            'peminjamans' => $peminjamans,
            'members' => $member,
            'koleksis' => $koleksi,
            'admin' => $this->admin->nama,
            'pager' => $peminjaman->pager,
            'currentPage' => $currentPage,
            'judul' => $judul,
            'tab' => 'Peminjaman'
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

        return view('/peminjaman/pinjam_form', $data);
    }

    public function verifikasi()
    {

        $currentPage = $this->request->getVar('page_peminjaman') ? $this->request->getVar('page_peminjaman') : 1;

        // validasi input
        if(!$this->validate([
            'nomorregistrasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nomor registrasi harus diisi",
                ]
            ],
            'nomormember' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nomor membership harus diisi",
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/peminjaman/pinjam_form/' . $this->request->getVar('koleksi_id'))->withInput();
        }

        // echo $this->request->getVar('nomorregistrasi');

        $koleksi = $this->koleksiModel->getKoleksi(false, $this->request->getVar('nomorregistrasi'));
        $member = $this->memberModel->getMember(false, $this->request->getVar('nomormember'));
        $buku = $this->biblioModel->getBiblio($koleksi['buku_id']);
        
        $peminjaman = $this->peminjamanModel->search($member['member_id']);

        $peminjamans = $peminjaman->paginate(10, 'peminjaman');

        $p_judul = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $p_judul[$i] = $this->biblioModel->getBiblio($k['buku_id'])['title'];
            $i++;
        }
        $p_member = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $p_member[$i] = $this->memberModel->getMember($k['member_id'])['nomor_membership'];
            $i++;
        }
        $p_koleksi = array();
        $i = 0;
        foreach ($peminjamans as $k) {
            $p_koleksi[$i] = $this->koleksiModel->getKoleksi($k['koleksi_id'])['nomor_registrasi'];
            $i++;
        }

        $data = [
            'title' => 'Verifikasi Pinjam Koleksi',
            'tab' => 'Peminjaman',
            'koleksis' => $koleksi,
            'members' => $member,
            'biblios' => $buku,
            'peminjamans' => $peminjamans,
            'p_judul' => $p_judul,
            'p_member' => $p_member,
            'p_koleksi' => $p_koleksi,
            'admin' => $this->admin,
            'pager' => $peminjaman->pager,
            'currentPage' => $currentPage,
            'validation' => \Config\Services::validation()
        ];

        return view('/peminjaman/verifikasi_pinjaman', $data);
    }
    public function save()
    {
        $this->peminjamanModel->save([
            'buku_id' => $this->request->getVar('buku-id'),
            'member_id' => $this->request->getVar('member-id'),
            'koleksi_id' => $this->request->getVar('koleksi-id'),
            'admin_id' => $this->request->getVar('admin-id'),
            'tanggal_pinjam' => $this->request->getVar('tanggal-pinjam'),
            'batas_kembali' => $this->request->getVar('batas-kembali'),
            'nomor_peminjaman' => $this->request->getVar('nomor-peminjaman'),
            'status' => 'Dalam Peminjaman',
        ]);

        $this->koleksiModel->save([
            'koleksi_id' => $this->request->getVar('koleksi-id'),
            'status' => 'Dipinjam'
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/peminjaman/index/');
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
