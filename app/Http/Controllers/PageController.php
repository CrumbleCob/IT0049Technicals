<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'customerCount' => Customer::query()->count(),
            'userCount' => User::query()->count(),
        ]);
    }

    public function about(): View
    {
        return view('about');
    }
}

