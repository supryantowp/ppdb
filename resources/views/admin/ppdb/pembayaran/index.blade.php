@extends('layouts.app')

@push('css')
<!-- Magnific popup -->
<link href="{{asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran PPDB</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/ppdb')}}">Ppdb</a></li>
                <li class="breadcrumb-item active">Pembayaran</li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Transaksi</h4>

                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Transaksi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                                <th>Bukti</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaksi->no_transaksi}}</td>
                                <td>{{$transaksi->status}}</td>
                                <td>
                                    @if ($transaksi->keterangan == 'pending')
                                    <span class="badge badge-warning">{{$transaksi->keterangan}}</span>
                                    @endif

                                    @if ($transaksi->keterangan == 'success')
                                    <span class="badge badge-success">{{$transaksi->keterangan}}</span>
                                    @endif

                                    @if ($transaksi->keterangan == 'failed')
                                    <span class="badge badge-danger">{{$transaksi->keterangan}}</span>
                                    @endif
                                </td>
                                <td>{{$transaksi->created_at->diffForHumans()}}</td>
                                <td>
                                    <a class="image-popup-vertical-fit"
                                        href="{{$transaksi->transaksi_ppdb->showBuktiPembayaran()}}"
                                        title="{{$transaksi->no_transaksi  . ' ' . $transaksi->transaksi_ppdb->nama}}.">
                                        <img class="img-fluid" alt=""
                                            src="{{$transaksi->transaksi_ppdb->showBuktiPembayaran()}}" width="145">
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('pembayaran.show', ['pembayaran' => $transaksi->id])}}"
                                            class="btn btn-info mr-1"><i class="mdi mdi-information"></i></a>
                                        <form class="frmTerima"
                                            action="{{route('pembayaran.update', ['pembayaran' => $transaksi->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="diterima">
                                            <button class="btn btn-success btn-terima mr-1"><i
                                                    class="mdi mdi-account-check"></i></button>
                                        </form>
                                        <form class="frmTidakTerima"
                                            action="{{route('pembayaran.update', ['pembayaran' => $transaksi->id])}}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="tidak diterima">
                                            <button class="btn btn-danger btn-tidak"><i
                                                    class="ion ion-trash-b"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$transaksis->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
@include('layouts.partial._datatable')

<!-- Magnific popup -->
<script src="{{asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<script>
    $('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}

	});
</script>

@endpush