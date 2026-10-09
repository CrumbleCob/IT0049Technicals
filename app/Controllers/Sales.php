<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;

class Sales extends BaseController
{
    public function index()
    {
        $sales = (new SaleModel())
            ->select('sales.*, products.name AS product_name, customers.full_name AS customer_name, users.full_name AS staff_name')
            ->join('products', 'products.id = sales.product_id')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->join('users', 'users.id = sales.sold_by')
            ->orderBy('sales.id', 'DESC')
            ->findAll();

        return view('sales/index', ['title' => 'Sales History', 'sales' => $sales]);
    }

    public function record()
    {
        helper(['form', 'url']);

        if ($this->request->is('post')) {
            $rules = [
                'product_id' => 'required|is_natural_no_zero',
                'customer_id' => 'permit_empty|is_natural_no_zero',
                'quantity' => 'required|integer|greater_than[0]',
            ];
            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $productId = (int) $this->request->getPost('product_id');
            $customerId = $this->request->getPost('customer_id') ?: null;
            $quantity = (int) $this->request->getPost('quantity');
            $db = db_connect();
            $db->transBegin();

            $product = $db->query(
                'SELECT * FROM products WHERE id = ? AND is_archived = 0 FOR UPDATE',
                [$productId]
            )->getRowArray();

            if (! $product) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', 'Please select an available product.');
            }
            if ($customerId && ! (new CustomerModel())->find((int) $customerId)) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', 'The selected customer no longer exists.');
            }
            if ($quantity > (int) $product['stock_quantity']) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', 'Not enough stock. Only ' . $product['stock_quantity'] . ' item(s) are available.');
            }

            $total = round((float) $product['price'] * $quantity, 2);
            $db->table('sales')->insert([
                'product_id' => $productId,
                'customer_id' => $customerId ? (int) $customerId : null,
                'sold_by' => (int) session('user_id'),
                'quantity' => $quantity,
                'total_price' => $total,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $db->table('products')->where('id', $productId)->update([
                'stock_quantity' => (int) $product['stock_quantity'] - $quantity,
            ]);

            if ($db->transStatus() === false) {
                $db->transRollback();
                return redirect()->back()->withInput()->with('error', 'The sale could not be saved. Please try again.');
            }
            $db->transCommit();
            return redirect()->to('/sales')->with('success', 'Sale recorded and stock updated.');
        }

        return view('sales/form', [
            'title' => 'Record Sale',
            'products' => (new ProductModel())->where('is_archived', 0)->where('stock_quantity >', 0)->orderBy('name')->findAll(),
            'customers' => (new CustomerModel())->orderBy('full_name')->findAll(),
        ]);
    }
}
