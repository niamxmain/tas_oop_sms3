@extends('../layout/admin')
@section('content')
<div class="container">
    <br />
    <h3 class="text-center">Tabel Penjualan</h3>
    <a href="/addsale" class="btn btn-success">Transaksi baru +</a>
    <div class="row mt-2">
        <div class="col-auto">
            <div class="input-group rounded">
                <form action="/sales" method="get">
                    <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </form>
            </div>
        </div>
        <div class="col-auto">
            <a href="/exportexcel" class="btn" style="background-color: #1d6f42; color: white">Export Excel</a>
        </div>

        <div class="col-auto">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Import Transaksi
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Pilih File
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" id="file" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Choose
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <a href="/cetakpdf" class="btn btn-danger">Cetak PDF</a>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">nama_produk</th>
                <th scope="col">harga_produk</th>
                <th scope="col">jumlah_produk</th>
                <th scope="col">total</th>
                <!-- <th scope="col">cetak</th> -->
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $id=>$d)
            <tr>
                <td>{{$id + $data->firstItem()}}</td>
                <td>{{$d->namaPelanggan}}</td>
                <td>{{$d->namaProduk}}</td>
                <td>
                    {{"Rp " . number_format($d->hargaProduk,0,',','.')}}
                </td>
                <td>{{$d->jumlahProduk}}</td>
                <td>{{"Rp " . number_format($d->total,0,',','.')}}</td>
                <!-- <td>
                    <button type="submit">Cetak</button>
                </td> -->
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
    {{ $data->links() }}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
@endsection