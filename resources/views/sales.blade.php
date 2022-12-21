<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Daftar Penjualan</title>
</head>

<body>
    <div class="container">
        <br>
        <h3 class="text-center">Tabel Penjualan</h3>
        <button type="button" class="btn btn-success">Transaksi baru +</button>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">nama_produk</th>
                    <th scope="col">harga_produk</th>
                    <th scope="col">jumlah_produk</th>
                    <th scope="col">total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d['id']}}</td>
                    <td>{{$d['namaPelanggan']}}</td>
                    <td>{{$d['namaProduk']}}</td>
                    <td>{{$d['hargaProduk']}}</td>
                    <td>{{$d['jumlahProduk']}}</td>
                    <td>{{$d['total']}}</td>
                    <td>
                        <button type="button" class="btn btn-warning">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>