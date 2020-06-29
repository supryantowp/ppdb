@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    Welcome {{Str::title(Auth::user()->name)}}
                </li>
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
                    <h6 class="text-uppercase mb-3">Siswa</h6>
                    <h4 class="mb-4">{{App\Siswa::count()}}</h4>
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
                    <h6 class="text-uppercase mb-3">Guru</h6>
                    <h4 class="mb-4">{{App\Guru::count()}}</h4>
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
                    <h6 class="text-uppercase mb-3">Kelas</h6>
                    <h4 class="mb-4">{{App\Kelas::count()}}</h4>
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
                    <h6 class="text-uppercase mb-3">Jurusan</h6>
                    <h4 class="mb-4">{{App\Jurusan::count()}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Keuangan</h4>

                <div class="row text-center m-t-20">
                    <div class="col-4">
                        <h5 class="">Rp. {{number_format(App\TransaksiPpdb::sum('jumlah_bayar'))}}</h5>
                        <p class="text-muted">Pendaftaran</p>
                    </div>
                    <div class="col-4">
                        <h5 class="">Rp. {{date('Y')}}</h5>
                        <p class="text-muted">Spp</p>
                    </div>
                    <div class="col-4">
                        <h5 class="">Rp.
                            {{number_format(App\TransaksiPpdb::where('created_at', 'LIKE', '%' . date('m') . '%' )->sum('jumlah_bayar'))}}
                        </h5>
                        <p class="text-muted">Bulan Ini</p>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-sm-12">
                        <h5 class="header-title">Perbulan</h5>
                        <div style="width: 100%">
                            {!! $dashboard->container() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- end row -->

<!-- end row -->
@endsection

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@if($dashboard)
{!! $dashboard->script() !!}
@endif

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endpush