<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Tabel Penjualan</h1>
    <table id="customers">
        <thead>

            <tr>
                <th scope="col">No</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($datas as $d)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td>{{$d->namaPelanggan}}</td>
                <td>{{$d->namaProduk}}</td>
                <td>{{$d->hargaProduk}}</td>
                <td>{{$d->jumlahProduk}}</td>
                <td>{{$d->total}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>

</html>