<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Products extends BaseController
{
    private ProductModel $products;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->products = new ProductModel();
    }

    public function index()
    {
        return view('products/index', [
            'title' => 'Products',
            'products' => $this->products->where('is_archived', 0)->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            if (! $this->validate($this->rules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->productData();
            $data['created_at'] = date('Y-m-d H:i:s');
            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && ! $image->hasMoved()) {
                $data['image'] = $this->prepareImage($image, 'products', 800);
            }

            $this->products->insert($data);
            return redirect()->to('/products')->with('success', 'Product added successfully.');
        }

        return view('products/form', ['title' => 'New Product', 'product' => null]);
    }

    public function edit(int $id)
    {
        $product = $this->findProduct($id);

        if ($this->request->is('post')) {
            if (! $this->validate($this->rules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->productData();
            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && ! $image->hasMoved()) {
                $data['image'] = $this->prepareImage($image, 'products', 800);
                $this->removeImage($product['image'] ?? null, 'products');
            }

            $this->products->update($id, $data);
            return redirect()->to('/products')->with('success', 'Product updated successfully.');
        }

        return view('products/form', ['title' => 'Edit Product', 'product' => $product]);
    }

    public function archive(int $id)
    {
        $this->findProduct($id);
        $this->products->update($id, ['is_archived' => 1]);
        return redirect()->to('/products')->with('success', 'Product archived without deleting its sales history.');
    }

    private function rules(): array
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'price' => 'required|decimal|greater_than_equal_to[0]',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
        ];
        $image = $this->request->getFile('image');
        if ($image && $image->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|ext_in[image,jpg,jpeg,png,webp]|max_size[image,2048]';
        }
        return $rules;
    }

    private function productData(): array
    {
        return [
            'name' => trim((string) $this->request->getPost('name')),
            'price' => (float) $this->request->getPost('price'),
            'stock_quantity' => (int) $this->request->getPost('stock_quantity'),
            'is_archived' => 0,
        ];
    }

    private function prepareImage($file, string $folder, int $size): string
    {
        $temp = WRITEPATH . 'uploads';
        $public = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folder;
        if (! is_dir($temp)) mkdir($temp, 0775, true);
        if (! is_dir($public)) mkdir($public, 0775, true);

        $name = $file->getRandomName();
        $file->move($temp, $name);
        $source = $temp . DIRECTORY_SEPARATOR . $name;
        $destination = $public . DIRECTORY_SEPARATOR . $name;

        try {
            service('image')->withFile($source)->fit($size, $size, 'center')->save($destination, 85);
        } catch (\Throwable $exception) {
            log_message('warning', 'Image resize skipped: ' . $exception->getMessage());
            copy($source, $destination);
        }
        @unlink($source);
        return $name;
    }

    private function removeImage(?string $name, string $folder): void
    {
        if (! $name) return;
        $path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . basename($name);
        if (is_file($path)) @unlink($path);
    }

    private function findProduct(int $id): array
    {
        $product = $this->products->find($id);
        if (! $product) {
            throw PageNotFoundException::forPageNotFound('Product not found.');
        }
        return $product;
    }
}
