<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #toast-container>.toast-warning {
            content: "\f004";
            background-color: yellow;
            color: black;
        }
    </style>
    <title>Daftar Penjualan</title>
</head>

<body>
    <div class="container">
        <br>
        <h3 class="text-center">Tabel Penjualan</h3>
        <a href="/addsale" class="btn btn-success">Transaksi baru +</a>
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
                <?php
                $no = 1;
                ?>
                @foreach($data as $d)
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>{{$d->namaPelanggan}}</td>
                    <td>{{$d->namaProduk}}</td>
                    <td>{{$d->hargaProduk}}</td>
                    <td>{{$d->jumlahProduk}}</td>
                    <td>{{$d->total}}</td>
                    <td>
                        <a href="/getdata/{{$d->id}}" class="btn btn-warning">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$d->id}}" data-nama="{{$d->nama}}">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".delete").click(function() {
            let id = $(this).attr("data-id");
            let nama = $(this).attr("data-nama");
            swal({
                title: "Hapus Data?",
                text: "Kamu yakin ingin hapus data " + nama,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    setInterval(() => {
                        window.location = "/deletedata/" + id;
                    }, 1500);
                    swal("Data berhasil dihapus", {
                        icon: "success",
                        timer: 3000,
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
        });
    </script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
        @elseif(Session::has('edited'))
        toastr.success("{{Session::get('edited')}}");
        @elseif(Session::has('deleted'))
        toastr.warning("{{Session::get('deleted')}}");
        @endif
    </script>
</body>

</html>