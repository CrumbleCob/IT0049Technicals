<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $sales = new SaleModel();
        $total = $sales->selectSum('total_price')->first();

        return view('home', [
            'title' => 'POS Dashboard',
            'productCount' => (new ProductModel())->where('is_archived', 0)->countAllResults(),
            'customerCount' => (new CustomerModel())->countAllResults(),
            'staffCount' => (new UserModel())->countAllResults(),
            'saleCount' => $sales->countAllResults(),
            'revenue' => (float) ($total['total_price'] ?? 0),
        ]);
    }
}
