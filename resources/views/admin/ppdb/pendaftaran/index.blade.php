@extends('layouts.app')

@push('css')
<!-- Sweet Alert --->
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">

@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pendaftaran PPDB</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/ppdb')}}">Ppdb</a></li>
                <li class="breadcrumb-item active">Pendaftaran</li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Pendaftaran Ppdb</h4>

                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Agama</th>
                            <th>Asal Sekolah</th>
                            <th>Jurusan Pertama</th>
                            <th>Jurusan Kedua</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ppdbs as $ppdb)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ppdb->data_ppdb->nama_siswa}}</td>
                            <td>{{$ppdb->data_ppdb->agama}}</td>
                            <td>{{$ppdb->data_ppdb->asal_sekolah}}</td>
                            <td>{{$ppdb->data_ppdb->jurusan_pertama}}</td>
                            <td>{{$ppdb->data_ppdb->jurusan_kedua}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('konfirmasi.show', ['konfirmasi' => $ppdb->data_ppdb->id])}}"
                                        class="btn btn-info mr-1"><i class="mdi mdi-information"></i></a>
                                    <form class="frmTerima"
                                        action="{{route('konfirmasi.update', ['konfirmasi' => $ppdb->data_ppdb->no_ppdb])}}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="diterima">
                                        <button class="btn btn-success btn-terima mr-1"><i
                                                class="mdi mdi-account-check"></i></button>
                                    </form>
                                    <form class="frmTidakTerima"
                                        action="{{route('konfirmasi.update', ['konfirmasi' => $ppdb->data_ppdb->no_ppdb])}}"
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
                        @empty

                        @endforelse
                    </tbody>
                </table>
                {{$ppdbs->links()}}
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

<script src="{{asset('js/component/konfirmasi_siswa.js')}}"></script>
@endpush