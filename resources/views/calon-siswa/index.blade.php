@extends('layouts.app')

@push('css')

<!-- Sweet Alert --->
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">

@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Selamat Datang</h4>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, nostrum!</p>
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

                @if ($hasDaftar)
                <p>Kamu sudah daftar</p>
                @else
                <h4 class="card-title font-16 mt-0">Daftar Sebagai Murid</h4>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel repellat esse et
                    iusto
                    labore minima..</p>
                <a href="{{route('calon-siswa.pendaftaran')}}"
                    class="btn btn-primary waves-effect waves-light col-sm-6 col-md-2">Daftar
                    Sekarang</a>
                @endif


            </div>

        </div>
    </div>
</div>
@endsection

@push('javascript')
<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

@if (Session::has('success'))
<script>
    Swal.fire("Berhasil!", "Silahkan tunggu informasi selanjutnya.", "success");
</script>
@endif

@include('layouts.partial._alert')

@endpush