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

    public function getdata($id)
    {
        $data = Sale::find($id);
        // dd($data);
        return view('editdata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Sale::find($id);
        $data->update($request->all());
        return redirect(route('/sales'));
    }

    public function deletedata($id)
    {
        $data = Sale::find($id);
        $data->delete($id);
        return redirect(route('/sales'));
    }
}
