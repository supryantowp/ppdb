@extends('layouts.app')

@push('css')

<!-- Sweet Alert --->
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">

@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pendaftaran</h4>
            <p>Untuk biaya pendaftaran adalah <strong>Rp 3.000.000</strong></p>
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

                <a href="{{route('pendaftaran.cetak')}}" class="btn btn-primary btn-icon mb-2"><i
                        class="ion-printer mr-2"></i>Cetak Bukti
                    Pendaftaran</a>

                <a href="{{route('pendaftaran.cetak-kelulusan', ['id' => $dataPpdb->id])}}"
                    class="btn btn-info btn-icon mb-2"><i class="mdi mdi-book-minus mr-2"></i>Cetak
                    Kelulusan</a>

                <p>Kamu sudah tedaftar cek di pengumuman untuk melihat informasi
                    <a class="text-info" href="{{route('pengumuman')}}">pengumuman</a>
                </p>

                <p>Ini nomor pendaftaran kamu <strong>{{$dataPpdb->no_ppdb}}</strong>.
                    <strong>{{$dataPpdb->tahun_ajar->title}}</strong> </p>

                <div id="accordion">
                    <div class="card mb-1">
                        <div class="card-header p-3" id="headingOne">
                            <h6 class="m-0 font-14">
                                <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Data Siswa #1
                                </a>
                            </h6>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <th>No KK</th>
                                                <th>NIK</th>
                                                <th>Nama Siswa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$dataPpdb->nisn}}</td>
                                                <td>{{$dataPpdb->no_kk}}</td>
                                                <td>{{$dataPpdb->nik_siswa}}</td>
                                                <td>{{$dataPpdb->nama_siswa}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1">
                        <div class="card-header p-3" id="headingTwo">
                            <h6 class="m-0 font-14">
                                <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Data Orang Tua #2
                                </a>
                            </h6>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NIK Ayah</th>
                                                <th>Nama Ayah</th>
                                                <th>Nik Ibu</th>
                                                <th>Nama Ibu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$dataPpdb->nik_ayah}}</td>
                                                <td>{{$dataPpdb->nama_ayah}}</td>
                                                <td>{{$dataPpdb->nik_ibu}}</td>
                                                <td>{{$dataPpdb->nama_ibu}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1">
                        <div class="card-header p-3" id="headingThree">
                            <h6 class="m-0 font-14">
                                <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Data Sekolah #3
                                </a>
                            </h6>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Npsn Sekolah</th>
                                                <th>Asal Sekolah</th>
                                                <th>Alamat Sekolah</th>
                                                <th>No SKHUN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$dataPpdb->npsn_sekolah}}</td>
                                                <td>{{$dataPpdb->asal_sekolah}}</td>
                                                <td>{{$dataPpdb->alamat_sekolah}}</td>
                                                <td>{{$dataPpdb->no_skhun}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
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