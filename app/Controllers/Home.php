<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home', [
            'title' => 'Dashboard',
            'customerCount' => (new CustomerModel())->countAll(),
            'userCount' => (new UserModel())->countAll(),
        ]);
    }
}
