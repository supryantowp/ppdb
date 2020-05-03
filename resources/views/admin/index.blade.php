@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
@endpush

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
            <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div>
            </div>
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

                <div class="form-group">
                    <label for="tahun">tahun : </label>
                    <select name="tahun">
                        <option value="">pilih</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                    </select>
                </div>

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

                <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
            </div>
        </div>
    </div>


</div>
<!-- end row -->

<!-- end row -->
@endsection

@push('javascript')
<!--Morris Chart-->
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>

<script>
    Morris.Bar({
    element: 'morris-area-example',
    data: [
        { a: "January", ppdb: 45,},
        { a: "February", ppdb: 75,},
        { a: "March", ppdb: 100, },
        { a: "April", ppdb: 75, },
        { a: "May", ppdb: 100, },
        { a: "June", ppdb: 75, },
        { a: "July", ppdb: 50, },
        { a: "August", ppdb: 75, },
        { a: "September", ppdb: 50, },
        { a: "October", ppdb: 75, },
        { a: "November", ppdb: 100, },
        { a: "December", ppdb: 80, }
      ],
    xkey: 'a',
    ykeys: ['ppdb'],
    labels: ['Ppdb', 'Spp']
    });
</script>
@endpush