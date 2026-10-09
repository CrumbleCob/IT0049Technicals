<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'profile' => (new UserModel())->select('username, full_name')->orderBy('id', 'ASC')->first(),
        ]);
    }

    public function about()
    {
        return view('about', ['title' => 'About']);
    }
}
