<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home(): string
    {
        return view('templates/header', ['title' => 'Home'])
            . view('pages/home')
            . view('templates/footer');
    }

    public function about(): string
    {
        return view('templates/header', ['title' => 'About'])
            . view('pages/about')
            . view('templates/footer');
    }
}
