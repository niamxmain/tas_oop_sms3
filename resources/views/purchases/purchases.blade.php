@extends('../layout/admin')
@section('content')
<div class="container">
    <br />
    <h3 class="text-center">Tabel Pembelian</h3>
    <a href="/addpurchase" class="btn btn-success">Tambah Pembelian</a>
    <div class="row mt-2">
        <div class="col-auto">
            <div class="input-group rounded">
                <form action="/products" method="get">
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
                Import Pembelian
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
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data as $id=>$d)
            <tr>
                <td><?php echo $no++; ?></td>
                <td>{{$d->nama}}</td>
                <td>{{$d->stok}}</td>
                <td>
                    <a href="/getproduct/{{$d->id}}" class="btn btn-warning">
                        Edit
                    </a>
                    <a href="/deleteproduct/{{$d->id}}" class="btn btn-danger delete" data-id="{{$d->id}}" data-nama="{{$d->nama}}">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- {{ $data->links() }} -->
</div>
@endsection