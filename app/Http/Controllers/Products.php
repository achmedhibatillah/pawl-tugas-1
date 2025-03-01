<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Logic;

use App\Models\ProductsModel;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;



class Products extends Controller
{
    protected $logic;

    public function __construct()
    {
        $this->logic = new Logic();
    }

    public function add(Request $request)
    {
        $logic = $this->logic;

        $request->validate([
            'product_name' => 'required|min:3|max:255',
            'product_price' => 'required|min:3|max:255',
        ], [
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.max' => 'Maksimal 255 karakter.',
            'product_name.min' => 'Minimal 3 karakter.',
            
            'product_price.required' => 'Harga produk harus diisi.',
            'product_price.max' => 'Maksimal 255 karakter.',
            'product_price.min' => 'Minimal 3 karakter.',
        ]);        

        $data = [
            'product_id' => $logic->generateUniqueId('products', 'product_id'),
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_photo' => 'ujicoba',
            'product_status' => 1
        ];

        ProductsModel::create($data);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $data = [
            'product_status' => 0
        ];

        ProductsModel::where('product_id', $request->product_id)->update($data);

        return redirect()->back();
    }
}
