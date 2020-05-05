@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Status PPDB</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/ppdb')}}">Ppdb</a></li>
                <li class="breadcrumb-item active">Status</li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Status Calon Siswa</h4>
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $statu)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$statu->data_ppdb->nama_siswa}}</td>
                                <td>{{$statu->data_ppdb->jurusan->name}}</td>
                                <td>
                                    @if ($statu->status == 'diterima')
                                    <span class="badge badge-primary">{{$statu->status}}</span>
                                    @endif

                                    @if ($statu->status == 'tidak diterima')
                                    <span class="badge badge-danger">{{$statu->status}}</span>
                                    @endif

                                    @if ($statu->status == 'belum di verifikasi')
                                    <span class="badge badge-info">{{$statu->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="header-title">Grafik</h4>

                <div class="row text-center m-t-20">
                    <div class="col-4">
                        <h5 class="">{{App\PengumumanPpdb::where('status', 'diterima')->count()}}</h5>
                        <p class="text-white-50">Diterima</p>
                    </div>
                    <div class="col-4">
                        <h5 class="">{{App\PengumumanPpdb::where('status', 'tidak diterima')->count()}}</h5>
                        <p class="text-white-50">Tidak Diterima</p>
                    </div>
                    <div class="col-4">
                        <h5 class="">{{App\PengumumanPpdb::where('status', 'belum di verifikasi')->count()}}</h5>
                        <p class="text-white-50">Belum di verifikasi</p>
                    </div>

                    <div style="width: 100%">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@if($chart)
{!! $chart->script() !!}
@endif

@include('layouts.partial._datatable')
@endpush