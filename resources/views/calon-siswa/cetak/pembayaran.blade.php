<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,700&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>

<body>
    <div class="header" style="text-align: center; margin-bottom: 20px;">
        <h1>SMKN 1 CIAMIS</h1>
        <h1>Laporan Pembayaran</h1>
        <p>jln jendral sudirman 3012321</p>
        <p>telp (20212)</p>

        <hr />
    </div>

    <div class="kontent">
        <h1>No Transaksi : {{$histori->no_transaksi}}</h1>
        <table border="1" style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Bayar</th>
                    <th>Total</th>
                    <th>Tujuan</th>
                    <th>Sisa</th>
                    <th>Status</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$histori->transaksi_ppdb->nama}}</td>
                    <td>{{$histori->transaksi_ppdb->fmtJumlahBayar()}}</td>
                    <td>{{$histori->transaksi_ppdb->fmtYangHarusDiBayar()}}</td>
                    <td>{{$histori->transaksi_ppdb->tujuan->no_rekening . '/' . $histori->transaksi_ppdb->tujuan->atas_nama }}
                    </td>
                    <td>{{$histori->fmtSisaBayar()}}</td>
                    <td>{{$histori->status}}</td>
                    <td>{{$histori->created_at->diffForHumans()}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>