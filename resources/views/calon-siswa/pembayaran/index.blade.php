@extends('layouts.app')

@push('css')
<!-- Sweet Alert --->
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">
@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran</h4>
            <p>Untuk biaya pendaftaran adalah <strong>Rp 3.000.000</strong></p>
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

                <hr>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis doloremque repudiandae distinctio
                    exercitationem mollitia eius quo quia ex animi reprehenderit.</p>

                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <h4 class="header-title">Histori Pembayaran</h4>

                        <a href="{{route('pembayaran.cetak.semua')}}" class="btn btn-icon btn-primary my-2">
                            <i class="ion-ios7-printer-outline mr-2"></i> Cetak Semuanya
                        </a>

                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <td>No Transakasi</td>
                                        <td>Jumlah Transaksi</td>
                                        <td>Sisa Bayar</td>
                                        <td>Status</td>
                                        <td>Waktu</td>
                                        <td>Pilihan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($historis as $histori)
                                    <tr>
                                        <td>{{$histori->no_transaksi}}</td>
                                        <td>{{$histori->transaksi_ppdb->fmtJumlahBayar()}}</td>
                                        <td>{{$histori->fmtSisaBayar()}}</td>
                                        <td>{{$histori->status}}</td>
                                        <td>{{$histori->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('pembayaran.detail', ['id' => $histori->id ])}}"
                                                class="btn btn-info btn-icon">
                                                <i class="mdi mdi-information-outline"></i>
                                            </a>

                                            <a href="{{route('pembayaran.cetak', ['id'=> $histori->id])}}"
                                                class="btn btn-danger btn-icon">
                                                <i class="ion-ios7-printer-outline"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <p>tidak ada transaksi</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mt-3">
                        <h5 class="header-title">Method Pembayaran</h5>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#offline" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Offline</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#online" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Online</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="offline" role="tabpanel">
                                <p class="mb-0">
                                    Silahkan datang ke sekolah
                                </p>
                            </div>
                            <div class="tab-pane p-3" id="online" role="tabpanel">
                                <p class="mb-2">Silahkan transer ke bank yang sudah tercantum</p>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Nama Bank</td>
                                            <td>No Rekening</td>
                                            <td>Atas Nama</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banks as $bank)
                                        <tr>
                                            <td>{{$bank->nama_bank}}</td>
                                            <td>{{$bank->no_rekening}}</td>
                                            <td>{{$bank->atas_nama}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <a class="btn btn-primary" href="{{route('pembayaran.konfirmasi')}}">Konfirmasi
                                    pembayaran</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<!-- Sweet Alert --->
<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<!-- Alert --->
@include('layouts.partial._alert')

@include('layouts.partial._datatable')
@endpush