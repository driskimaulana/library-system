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
