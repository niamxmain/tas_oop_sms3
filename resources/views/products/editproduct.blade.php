<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Daftar Produk</title>
</head>

<body>
    <div class="container">
        <h1 class="my-3 text-center">Tambah Produk</h1>
        <div class="row justify-content-center">
            <div class="col-6">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <form action="/updateproduct/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" name="code" id="code" value="{{$data->code}}" aria-describedby="">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{$data->nama}}" aria-describedby="">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" name="harga" id="harga" value="{{$data->harga}}" aria-describedby="">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" oninput="totalFunc()" class="form-control" name="stock" id="stock" value="{{$data->stock}}" aria-describedby="" readonly>
                            </div> -->
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
                                            <h5>Nama Produk: <span id="nama"></span></h5>
                                            <h5>Harga: <span id="harga"></span></h5>
                                            <h5>Stok: <span id="stock"></span></h5>
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
</body>

</html>