<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_member') ? $this->request->getVar('page_member') : 1;

        if($this->request->getVar('keyword')){
            $member = $this->memberModel->search($this->request->getVar('keyword'));
        }else{ 
            $member = $this->memberModel;
        }

        $data = [
            'title' => 'Daftar Member',
            'members' => $member->paginate(10, 'member'),
            'pager' => $member->pager,
            'currentPage' => $currentPage,
            'tab' => 'Member'
        ];

        return view('member/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Pendaftaran Member',
            'tab' => 'Member',
            'validation' => \Config\Services::validation()
        ];

        return view('member/tambah', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'nomor-membership' => [
                'rules' => 'required|is_unique[member.nomor_membership]|integer|exact_length[16]',
                'errors' => [
                    'required' => "Nomor Membership harus diisi",
                    'is_unique' => "Nomor Membership sudah terdaftar",
                    'integer' => "Hanya menerima number",
                    'exact_length' => 'Harus 14 Karakter'
                ]
            ],
            'img' => [
                'rules' => 'max_size[img, 2028]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
            ],
            'email' => [
                'rules' => 'required',
            ],
            'telepon' => [
                'rules' => 'required|integer',
            ],
            'alamat' => [
                'rules' => 'required',
            ],
            'tanggal-lahir' => [
                'rules' => 'required',
            ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/member/tambah')->withInput();
        }

        // ambil gambar
        $imgProfile = $this->request->getFile('img');

        // jika tidak ada yang diupload
        if($imgProfile->getError() == 4){
            $filenameProfile = 'default.png';
        }else{
            // generate random name
            $filenameProfile =  $imgProfile->getRandomName();
            
            // pindahkan ke folder img
            $imgProfile->move('images', $filenameProfile);
        }

        // ambil nama file
        // $namasampul = $filesampul->getName();

        $this->memberModel->save([
            'nomor_membership' => $this->request->getVar('nomor-membership'),
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $this->request->getVar('tanggal-lahir'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'img' => $filenameProfile,
            'status_membership' => 'Aktif'
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/member/index');
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->memberModel->getMember($id)['nama'],
            'members' => $this->memberModel->getMember($id),
            'tab' => 'Member'
        ];

        return view('member/detail', $data);
    }

}
