@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard PPDB</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{url('admin/ppdb')}}">Ppdb</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Pendaftar</h6>
                    <h4 class="mb-4">{{App\DataPpdb::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-buffer float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Kuota</h6>
                    <h4 class="mb-4">{{App\KuotaJurusan::sum('jumlah_daftar')}} / {{App\KuotaJurusan::sum('kuota')}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-tag-text-outline float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Diterima</h6>
                    <h4 class="mb-4">{{App\PengumumanPpdb::where('status', 'diterima')->count()}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-briefcase-check float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3">Tidak Diterima</h6>
                    <h4 class="mb-4">{{App\PengumumanPpdb::where('status', 'tidak diterima')->count()}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection