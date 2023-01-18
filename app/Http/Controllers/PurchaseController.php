<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Purchase::where('nama', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Purchase::paginate(5);
        }
        return view('purchases.purchases', compact('data'));
    }

    public function addpurchase()
    {
        $data = Product::all();
        return view('purchases.addpurchase', compact('data'));
    }

    public function insertdatapurchases(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->prodId);
        $product->stok += $request->stok;
        $product->save;
        $productName = Product::find($request->prodId)->nama;
        $purchase = new Purchase();
        $purchase->nama = $productName;
        $purchase->stock = Purchase::find($request->stok);
        Purchase::create($request->all());
        return redirect(route('/purchases'))->with('success', 'Data berhasil ditambahkan');
    }

    public function getpurchase($id)
    {
    }

    public function updatepurchase($id)
    {
    }

    public function deletepurchase($id)
    {
    }
}
