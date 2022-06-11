<?php

namespace App\Controllers;

use App\Models\BiblioModel;

class Biblio extends BaseController
{
    protected $biblioModel;

    public function __construct()
    {
        $this->biblioModel = new BiblioModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_biblio') ? $this->request->getVar('page_biblio') : 1;

        if($this->request->getVar('keyword')){
            $biblio = $this->biblioModel->search($this->request->getVar('keyword'));
        }else{ 
            $biblio = $this->biblioModel;
        }

        $data = [
            'title' => 'Daftar Biblio',
            'biblios' => $biblio->paginate(10, 'biblio'),
            'pager' => $biblio->pager,
            'currentPage' => $currentPage,
            'tab' => 'Biblio'
        ];

        return view('biblio/index', $data);
    }

    public function form()
    {
        $data = [
            'title' => 'Tambah Biblio Baru',
            'validation' => \Config\Services::validation(),
            'tab' => 'Biblio'
        ];

        return view('biblio/form', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'title' => [
                'rules' => 'required',
            ],
            'authors' => [
                'rules' => 'required',
            ],
            'isbn' => [
                'rules' => 'required',
            ],
            'language-code' => [
                'rules' => 'required',
            ],
            'num-pages' => [
                'rules' => 'required',
            ],
            'publication-date' => [
                'rules' => 'required',
            ],
            'publisher' => [
                'rules' => 'required',
            ],
            'img' => [
                'rules' => 'max_size[img, 2028]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],


        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/biblio/form')->withInput();
        }

        // ambil gambar
        $imgProfile = $this->request->getFile('img');
        
        // jika tidak ada yang diupload
        if($imgProfile->getError() == 4){
            $filenameProfile = 'default_book.png';
        }else{
            // generate random name
            $filenameProfile =  $imgProfile->getRandomName();
            
            // pindahkan ke folder img
            $imgProfile->move('images/books/', $filenameProfile);
        }
        

        // ambil nama file
        // $namasampul = $filesampul->getName();

        $this->biblioModel->save([
            'title' => $this->request->getVar('title'),
            'authors' => $this->request->getVar('authors'),
            'average_rating' => $this->request->getVar('average-rating'),
            'isbn' => $this->request->getVar('isbn'),
            'isbn13' => $this->request->getVar('isbn13'),
            'language_code' => $this->request->getVar('language-code'),
            'num_pages' => $this->request->getVar('num-pages'),
            'ratings_count' => $this->request->getVar('ratings-count'),
            'publication_date' => $this->request->getVar('publication-date'),
            'publisher' => $this->request->getVar('publisher'),
            'img' => $filenameProfile
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/biblio/index');
    }

    public function detail($id)
    {
        $data = [
            'title' => $this->biblioModel->getBiblio($id)['title'],
            'biblios' => $this->biblioModel->getBiblio($id),
            'tab' => 'Biblio'
        ];

        return view('biblio/detail', $data);
    }

}
