<?php

namespace App\Http\Controllers;

use App\Exports\SaleExport;
use App\Imports\SaleImport;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // $data = Sale::all();
        if ($request->has('search')) {
            $data = Sale::where('namaPelanggan', 'like', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Sale::paginate(5);
        }
        return view('sales.sales', compact('data'));
    }

    public function addsale()
    {
        $data = Product::all();
        return view('sales.addsale', compact('data'));
    }

    public function insertdatasales(Request $request)
    {
        // dd($request->all());
        Sale::create($request->all());
        return redirect(route('/sales'))->with('success', 'Data berhasil ditambahkan');
    }

    public function getdata($id)
    {
        $data = Sale::find($id);
        // dd($data);
        return view('sales.editdata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Sale::find($id);
        $data->update($request->all());
        return redirect(route('/sales'))->with('edited', 'Data berhasil diedit');
    }

    public function deletedata($id)
    {
        $data = Sale::find($id);
        $data->delete($id);
        return redirect(route('/sales'))->with('deleted', 'Data berhasil dihapus');
    }

    public function exportexcel()
    {
        return Excel::download(new SaleExport, 'users.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');
        $filename = $data->getClientOriginalName();
        $data->move('dataexcel', $filename);
        Excel::import(new SaleImport, \public_path('/dataexcel/' . $filename));

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function cetakpdf()
    {
        $data = Sale::all();
        view()->share('datas', $data);
        return PDF::loadView('sales.filePDF', $data->toArray())->stream('');
        // return view('')
    }
}
