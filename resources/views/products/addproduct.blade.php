@extends('layout.admin')
@section('content')
<div class="container">
    <h1 class="my-3 text-center">Tambah Produk</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="/insertdataproducts" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control" name="code" id="code" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="0" aria-describedby="" readonly>
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
                                        <h5>Kode Produk: <span id="codeModal"></span></h5>
                                        <h5>Nama Produk: <span id="namaModal"></span></h5>
                                        <h5>Stok: <span id="stockModal"></span></h5>
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
        document.getElementById('codeModal').innerHTML = document.getElementById('code').value;
        document.getElementById('namaModal').innerHTML = document.getElementById('nama').value;
        document.getElementById('stockModal').innerHTML = document.getElementById('stock').value;
    }
</script>
@endsection