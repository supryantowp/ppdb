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

                <p class="text-muted m-b-30">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste reiciendis laboriosam molestiae
                    tenetur natus tempore saepe at fugit hic! Unde.
                </p>

                <div class="form-group">

                </div>
                <div class="card-actions ">
                    <form action="" method="get" class="form-inline float-right mb-3">
                        <input type="text" class="form-control" placeholder="Cari no ppdb" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-icon" type="submit"><i class="ion-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan Pertama</th>
                                <th>Jurusan Kedua</th>
                                <th>Status</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($pengumuman as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->data_ppdb->nama_siswa}}</td>
                                <td>{{$item->data_ppdb->asal_sekolah}}</td>
                                <td>{{$item->data_ppdb->jurusan_pertama}}</td>
                                <td>{{$item->data_ppdb->jurusan_kedua}}</td>
                                <td>

                                    @if ($item->status == 'belum di verifikasi')
                                    <span class="badge badge-info">{{$item->status}}</span>
                                    @endif

                                    @if ($item->status == 'diterima')
                                    <span class="badge badge-success">{{$item->status}}</span>
                                    @endif

                                    @if ($item->status == 'tidak diterima')
                                    <span class="badge badge-danger">{{$item->status}}</span>
                                    @endif

                                </td>
                            </tr>
                            @empty
                            <p>Ngga ada pengumuman</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                {{$pengumuman->links()}}
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@push('javascript')
@include('layouts.partial._datatable')
@endpush