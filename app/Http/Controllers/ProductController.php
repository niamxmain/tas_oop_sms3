<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Product::where('namaPelanggan', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Product::paginate(5);
        }
        return view('products.products', compact('data'));
    }

    public function addproduct()
    {
        return view('products.addproduct');
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        Product::create($request->all());
        return redirect(route('/products'))->with('success', 'Data berhasil ditambahkan');
    }

    public function getproduct($id)
    {
        $data = Product::find($id);
        // dd($data);
        return view('products.editproduct', compact('data'));
    }

    public function updateproduct(Request $request, $id)
    {
        $data = Product::find($id);
        $data->update($request->all());
        return redirect(route('/products'))->with('edited', 'Data berhasil diedit');
    }

    public function deleteproduct($id)
    {
        $data = Product::find($id);
        $data->delete($id);
        return redirect(route('/products'));
    }
}
