<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private CustomerModel $customers;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->customers = new CustomerModel();
    }

    public function index()
    {
        return view('customers/index', [
            'title' => 'Customers',
            'customers' => $this->customers->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $rules = [
                'full_name' => 'required|min_length[2]|max_length[100]',
                'email' => 'required|valid_email|max_length[120]',
                'phone' => 'permit_empty|max_length[30]',
                'address' => 'permit_empty|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $this->customers->insert($this->customerData());
            return redirect()->to('/customers')->with('success', 'Customer added successfully.');
        }

        return view('customers/form', ['title' => 'New Customer', 'customer' => null]);
    }

    public function edit(int $id)
    {
        $customer = $this->customers->find($id);
        if (! $customer) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        if ($this->request->is('post')) {
            $rules = [
                'full_name' => 'required|min_length[2]|max_length[100]',
                'email' => 'required|valid_email|max_length[120]',
                'phone' => 'permit_empty|max_length[30]',
                'address' => 'permit_empty|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $this->customers->update($id, $this->customerData());
            return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
        }

        return view('customers/form', ['title' => 'Edit Customer', 'customer' => $customer]);
    }

    private function customerData(): array
    {
        return [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
            'phone' => trim((string) $this->request->getPost('phone')),
            'address' => trim((string) $this->request->getPost('address')),
        ];
    }
}
