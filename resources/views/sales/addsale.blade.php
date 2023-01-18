@extends('../layout/admin')
@section('content')
<div class="container">
    <h1 class="my-3 text-center">Tambah Data Transaksi</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="/insertdatasales" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <div class="row g-3">
                                <div class="col-auto">
                                    <label for="namaProduk" class="form-label">Nama Produk</label>
                                    <select class="form-select" name="namaProduk" id="namaProduk" onchange="changes()" aria-label="Default select example">
                                        <option selected disabled>Pilih Produk</option>
                                        @foreach($data as $d)
                                        <option value="{{$d->nama}}">{{$d->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="hargaProduk" class="form-label">Harga Produk</label>
                            <input type="number" onchange="changes()" oninput="totalFunc()" class="form-control" name="hargaProduk" id="hargaProduk" aria-describedby="">
                        </div>

                        <div class="mb-3">
                            <label for="jumlahProduk" class="form-label">Jumlah Produk</label>
                            <input type="number" oninput="totalFunc()" class="form-control" name="jumlahProduk" id="jumlahProduk" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" class="form-control" name="total" id="total" aria-describedby="" readonly="true">
                        </div>
                        <div class="mb-3">
                            <label for="bayar" class="form-label">Bayar</label>
                            <input type="number" oninput="kembali()" class="form-control" name="bayar" id="bayar" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="kembalian" class="form-label">Kembalian</label>
                            <input type="number" class="form-control" name="kembalian" id="kembalian" aria-describedby="" readonly>
                        </div>
                        <button type="button" onclick="modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Konfirmasi</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cross Check Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Pelanggan: <span id="pelanggan"></span></h5>
                                        <h5>Produk: <span id="produk"></span></h5>
                                        <h5>Harga: <span id="harga"></span></h5>
                                        <h5>Jumlah: <span id="jumlah"></span></h5>
                                        <h5>Total: <span id="totalModal"></span></h5>
                                        <h5>Bayar: <span id="bayarModal"></span></h5>
                                        <h5>Kembalian: <span id="kembali"></span></h5>
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
<script>
    function modal() {
        $('#pelanggan').html($('#namaPelanggan').val());
        $('#produk').html($('#namaProduk').val());
        $('#harga').html($('#hargaProduk').val());
        $('#jumlah').html($('#jumlahProduk').val());
        $('#totalModal').html($('#total').val());
        $('#bayarModal').html($('#bayar').val());
        $('#kembali').html($('#kembalian').val());
    }

    function totalFunc() {
        const hargaProduk = document.getElementById("hargaProduk").value;
        const jumlahProduk = document.getElementById("jumlahProduk").value;
        let total = hargaProduk * jumlahProduk
        // document.getElementById("total").placeholder = total;
        document.getElementById("total").value = total;
    }

    function kembali() {
        let total = $("#total").val();
        let bayar = $("#bayar").val();
        let kembali = bayar - total;
        console.log(kembali);
        document.getElementById('kembalian').value = kembali;
    }

    // Flexible data by id
    function changes() {
        let idProduk = document.getElementById('namaProduk').value;
        let prodId = parseInt(idProduk);
        let hargaProduk = document.getElementById('hargaProduk');
    }
</script>
@endsection