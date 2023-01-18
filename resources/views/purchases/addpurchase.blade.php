@extends('layout.admin')
@section('content')
<div class="container">
    <h1 class="my-3 text-center">Tambah Pembelian</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="/insertdatapurchases" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="prodId" class="form-label">Nama Produk</label>
                            <select class="form-select" name="prodId" id="prodId" aria-label="Default select example">
                                <!-- <option selected disabled>Pilih Kode Produk</option> -->
                                @foreach($data as $d)
                                <option value="{{$d->id}}">{{$d->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" aria-describedby="">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <!-- Button trigger modal -->
                        <button type="submit" class="btn btn-primary">
                            Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection