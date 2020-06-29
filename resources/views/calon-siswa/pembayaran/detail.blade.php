@extends('layouts.app')

@push('css')
<!-- Magnific popup -->
<link href="{{asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Detail Pembayaran no transaksi : {{$histori->no_transaksi}}</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, ipsa reiciendis maxime nisi delectus
                repudiandae provident vel quia enim aperiam.</p>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-2">
            <div class="card-body">

                <h4 class="mt-0 header-title">Hai, {{Str::title(Auth::user()->name)}} 👋🏻</h4>

                <a href="{{route('pembayaran.cetak', ['id' => $histori->id])}}" class="btn btn-primary btn-icon"><i
                        class="ion-ios7-printer-outline mr-2"></i>Cetak</a>
                <hr>

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-3">Nama : </label>
                            <div class="col-sm-9">{{$histori->transaksi_ppdb->nama}}</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Bayar : </label>
                            <div class="col-sm-9">{{$histori->transaksi_ppdb->fmtJumlahBayar()}}</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Total : </label>
                            <div class="col-sm-9">{{$histori->transaksi_ppdb->fmtYangHarusDiBayar()}}</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group row">
                            <label class="col-sm-3">Tujuan</label>
                            <div class="col-sm-9">
                                {{$histori->transaksi_ppdb->tujuan->no_rekening}} /
                                {{$histori->transaksi_ppdb->tujuan->atas_nama}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">Sisa</div>
                            <div class="col-sm-9">{{$histori->fmtSisaBayar()}}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">Status</div>
                            <div class="col-sm-9">
                                <strong
                                    class="text-{{$histori->status == 'lunas' ? 'success' : 'danger'}}">{{$histori->status}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="images">
                            <a class="image-popup-vertical-fit"
                                href="{{$histori->transaksi_ppdb->showBuktiPembayaran()}}" title="Bukti pembayaran.">
                                <img class="img-thumbnail" alt=""
                                    src="{{$histori->transaksi_ppdb->showBuktiPembayaran()}}">
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
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