<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $data = Sale::all();
        return view('sales', compact('data'));
    }

    public function addsale()
    {
        return view('addsale');
    }

    public function insertdata(Request $request)
    {
        // dd($request->all());
        Sale::create($request->all());
        return redirect(route('/sales'));
    }
}
