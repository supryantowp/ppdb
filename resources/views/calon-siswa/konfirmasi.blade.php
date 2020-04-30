@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pendaftaran</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, numquam?</p>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Formulir Pendaftaran Siswa</h4>
                <p>Konfirmasi</p>

                <div class="mb-3">
                    <a class="btn btn-secondary" href="{{route('calon-siswa.pendaftaran')}}">step 1</a>
                    <a class="btn btn-secondary" href="{{route('pendaftaran-step-2')}}">step 2</a>
                    <a class="btn btn-secondary" href="{{route('pendaftaran-step-3')}}">step 3</a>
                    <a class="btn btn-primary" href="{{route('pendaftaran.konfirmasi')}}">konfirmasi</a>
                </div>

                <form action="{{route('pendaftaran.data-siswa-3')}}" method="post">

                    @csrf

                    <div class="form-group row">
                        <div class="col-12">
                            <a href="{{route('pendaftaran-step-2')}}" class="btn btn-secondary col-2">kembali</a>
                            <button class="col-2 btn btn-primary float-right btn-lanjut">lanjut</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection