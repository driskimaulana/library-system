<?php

namespace App\Controllers;

use App\Entities\User;

class Home extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        $current_user = $auth->user();
        $data = [
            'title' => 'Home',
            'user' => $current_user,
            'tab' => 'Home'
        ];
        return view('index', $data);
    }
}
