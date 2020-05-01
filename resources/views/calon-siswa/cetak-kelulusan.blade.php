<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        @if ($pengumuman)
        <h1>{{$pengumuman->status}}</h1>

        @else
        <h1>Belum di verikasi</h1>
        @endif

    </div>
</body>

</html>