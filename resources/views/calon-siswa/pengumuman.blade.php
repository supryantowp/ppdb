@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">List Pendaftar</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, ut!</p>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Hai, {{Str::title(Auth::user()->name)}} 👋🏻</h4>
                <hr>

                @if ($status)

                @if ($status->status == 'belum di verifikasi')
                <p>Mohon tunggu pendaftaran sedang di proses...</p>
                @endif

                @if ($status->status == 'diterima')
                <div class="alert alert-success mb-0" role="alert">
                    <strong>Diterima!</strong> terima kasih silakan lanjutkan untuk
                    <a href="{{route('pendaftaran.pembayaran')}}" class="alert-link">pembayaran</a>.
                </div>
                @endif

                @if ($status->status == 'tidak diterima')
                <div class="alert alert-danger mb-0" role="alert">
                    <strong>Tidak Diterima!</strong> mohon maaf.
                </div>
                @endif

                @else

                <p>kamu belum melakukan pendaftaran</p>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection