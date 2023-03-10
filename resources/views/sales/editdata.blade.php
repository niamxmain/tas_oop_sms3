@extends('layout.admin')
@section('content')
<div class="container">
    <h1 class="my-3 text-center">Edit Data Transaksi</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan" aria-describedby="" value="{{$data->namaPelanggan}}">
                        </div>
                        <div class="mb-3">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="namaProduk" id="namaProduk" aria-describedby="" value="{{$data->namaProduk}}">
                        </div>
                        <div class="mb-3">
                            <label for="hargaProduk" class="form-label">Harga Produk</label>
                            <input type="number" oninput="totalFunc()" class="form-control" name="hargaProduk" id="hargaProduk" aria-describedby="" value="{{$data->hargaProduk}}">
                        </div>

                        <div class="mb-3">
                            <label for="jumlahProduk" class="form-label">Jumlah Produk</label>
                            <input type="number" oninput="totalFunc()" class="form-control" name="jumlahProduk" id="jumlahProduk" aria-describedby="" value="{{$data->jumlahProduk}}">
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" class="form-control" name="total" id="total" aria-describedby="" readonly="true" value="{{$data->total}}">
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <!-- Button trigger modal -->
                        <button type="button" onclick="modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Konfirmasi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cross Check Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Nama Pelanggan: <span id="namaModal"></span></h5>
                                        <h5>Nama Produk: <span id="namaProdukModal"></span></h5>
                                        <h5>Harga Produk: <span id="hargaProdukModal"></span></h5>
                                        <h5>Jumlah Produk: <span id="jumlahProdukModal"></span></h5>
                                        <h5>Total: <span id="totalModal"></span></h5>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let namaPelanggan = document.getElementById('namaPelanggan');
    let namaProduk = document.getElementById('namaProduk');
    let hargaProduk = document.getElementById('hargaProduk');
    let jumlahProduk = document.getElementById('jumlahProduk');
    let total = document.getElementById('total');

    // total.value = valTotal;
    function totalFunc() {
        const hargaProduk = document.getElementById("hargaProduk").value;
        const jumlahProduk = document.getElementById("jumlahProduk").value;
        let total = hargaProduk * jumlahProduk
        document.getElementById("total").placeholder = total;
        document.getElementById("total").value = total;
    }

    function modal() {
        document.getElementById('namaModal').innerHTML = namaPelanggan.value;
        document.getElementById('namaProdukModal').innerHTML = namaProduk.value;
        document.getElementById('hargaProdukModal').innerHTML = hargaProduk.value;
        document.getElementById('jumlahProdukModal').innerHTML = jumlahProduk.value;
        document.getElementById('totalModal').innerHTML = total.value;
    }
</script>
@endsection