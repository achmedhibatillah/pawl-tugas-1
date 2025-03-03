<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Logic;
use App\Http\Resources\ProductsResource;
use App\Models\ProductsModel;
use App\Models\OrdersModel;
use App\Models\OrdersDetailModel;

use Illuminate\Support\Str;

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
            'product_photo' => 'required',
        ], [
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.max' => 'Maksimal 255 karakter.',
            'product_name.min' => 'Minimal 3 karakter.',
            
            'product_price.required' => 'Harga produk harus diisi.',
            'product_price.max' => 'Maksimal 255 karakter.',
            'product_price.min' => 'Minimal 3 karakter.',

            'product_photo.required' => 'Foto produk harus diisi.',
        ]);        

        $file = $request->file('product_photo');
        $filename = time() . '-' . Str::slug($request->product_name) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/product'), $filename);
        $photoPath = 'uploads/product/' . $filename;

        $data = [
            'product_id' => $logic->generateUniqueId('products', 'product_id'),
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name),
            'product_price' => $request->product_price,
            'product_photo' => $photoPath,
            'product_status' => 1 
        ];

        ProductsModel::create($data);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $logic = $this->logic;
    
        // Validasi input dan file
        $request->validate([
            'product_name' => 'required|min:3|max:255',
            'product_price' => 'required|numeric',
            'product_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.max' => 'Maksimal 255 karakter.',
            'product_name.min' => 'Minimal 3 karakter.',
            'product_price.required' => 'Harga produk harus diisi.',
            'product_price.numeric' => 'Harga harus berupa angka.',
            'product_photo.image' => 'File harus berupa gambar.',
            'product_photo.mimes' => 'Format yang diizinkan: jpeg, png, jpg, gif, svg.',
            'product_photo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
    
        // Ambil data produk dari database
        $product = ProductsModel::where('product_id', $request->product_id)->first();
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    
        // Cek apakah ada perubahan nama untuk slug
        $slug = ($product->product_name === $request->product_name) ? $product->product_slug : Str::slug($request->product_name);
    
        // Jika ada file baru yang diupload
        if ($request->hasFile('product_photo')) {
            // Hapus file lama jika ada
            if ($product->product_photo && file_exists(public_path($product->product_photo))) {
                unlink(public_path($product->product_photo));
            }
    
            // Simpan file baru
            $file = $request->file('product_photo');
            $fileName = time() . '-' . Str::slug($request->product_name) . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/product/' . $fileName;
            $file->move(public_path('uploads/product'), $fileName);
        } else {
            $filePath = $product->product_photo; // Gunakan foto lama jika tidak ada yang diunggah
        }
    
        $product->update([
            'product_name' => $request->product_name,
            'product_slug' => $slug,
            'product_price' => $request->product_price,
            'product_photo' => $filePath,
        ]);
    
        return redirect()->to('atur-produk/' . $slug)->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete(Request $request)
    {
        $data = [
            'product_status' => 0
        ];

        ProductsModel::where('product_id', $request->product_id)->update($data);

        return redirect()->to('atur-produk');
    }

    public function pilih_produk($product_id)
    {
        if(!(session()->has('is_user'))) {
            session(['page-menu' => true]);
            return redirect()->to('login')->with('info-auth', 'Silakan login terlebih dahulu sebelum melakukan pemesanan.');
        }

        $cart = session()->get('cart', []);
    
        $cart[] = $product_id;
    
        session(['cart' => $cart]);
    
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function kurang_produk($product_id)
    {
        if(!(session()->has('is_user'))) {
            return redirect()->to('login')->with('info-auth', 'Silakan login terlebih dahulu sebelum melakukan pemesanan.');
        }

        $cart = session()->get('cart', []);

        if (($key = array_search($product_id, $cart)) !== false) {
            unset($cart[$key]);
        }

        $cart = array_values($cart);

        session(['cart' => $cart]);

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function batal_produk($product_id)
    {
        if(!(session()->has('is_user'))) {
            return redirect()->to('login')->with('info-auth', 'Silakan login terlebih dahulu sebelum melakukan pemesanan.');
        }

        if (session()->has('cart')) {
            $cartSession = session()->get('cart');

            if (is_array($cartSession)) {
                $cartSession = array_filter($cartSession, fn($id) => $id != $product_id);

                session()->put('cart', array_values($cartSession));
            }
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function getJson()
    {
        $data = ProductsModel::where('product_status', 1)->get();
        return ProductsResource::collection($data);
    }

    public function getJsonDetail($product_slug)
    {
        $data = ProductsModel::where('product_slug', $product_slug)->first();
        return new ProductsResource($data);
    }
}
