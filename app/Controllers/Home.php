<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // send data
        $data = [
            'title' => 'Home',
            'tab' => 'Home'
        ];
        return view('index', $data);
    }
}
