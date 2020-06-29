@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
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

                <h4 class="mt-0 header-title">Formulir Pendaftaran Siswa</h4>
                <p>Data Sekolah #3</p>

                <div class="mb-3">
                    <a class="btn btn-secondary" href="{{route('calon-siswa.pendaftaran')}}">step 1</a>
                    <a class="btn btn-secondary" href="{{route('pendaftaran-step-2')}}">step 2</a>
                    <a class="btn btn-primary" href="{{route('pendaftaran-step-3')}}">step 3</a>
                </div>

                @if (Session::has('errors'))
                <div class="alert alert-danger mb-3" role="alert">
                    <strong>Tidak bisa!</strong> harus isi form ini terlebih dahulu
                </div>
                @endif

                <form action="{{route('pendaftaran.store')}}" method="post" id="form-pendaftaran"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Siswa</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="file" class="filestyle" data-buttonname="btn-secondary" name="foto_siswa"
                                    value="{{ session()->get(Str::snake('foto_siswa')) ? session()->get(Str::snake('foto_siswa')) : old(Str::snake('foto_siswa'))}}">
                                <strong>Max. 2MB. Format JPG, JPEG, PNG.</strong>
                                <br>
                                @error('foto_siswa')
                                <span class="feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label',' Npsn sekolah')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Asal sekolah')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat sekolah :</label>
                        <div class="col-sm-9">
                            <textarea name="alamat_sekolah"
                                class="form-control @error('alamat_sekolah') is-invalid @enderror" rows="3"
                                placeholder="masukan alamat sekolah">{{session()->get('alamat_sekolah')}}</textarea>
                            @error('alamat_sekolah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label','No Skhun')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label">Tinggal Dengan</label>
                        <div class="col-sm-9">
                            <select name="tinggal_dengan"
                                class="form-control @error('tinggal_dengan') is-invalid @enderror">
                                <option value="">pilih</option>
                                <option value="Ikut Ortu"
                                    {{old('tinggal_dengan') || session()->get('tinggal_dengan') == 'Ikut Ortu' ? 'selected' : null}}>
                                    Ikut Orang Tua</option>
                                <option value="Kostan"
                                    {{old('tinggal_dengan') || session()->get('tinggal_dengan') == 'Kostan' ? 'selected' : null}}>
                                    Kostan</option>
                            </select>
                            @error('tinggal_dengan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jurusan Pilihan Pertama :</label>
                        <div class="col-sm-9">
                            <select name="jurusan_pilihan_pertama" id="jurusan_pertama"
                                class="form-control @error('jurusan_pilihan_pertama') is-invalid @enderror">
                                <option value="">pilih</option>
                                @foreach ($jurusan as $item)
                                <option value="{{$item->id}}"
                                    {{session()->get('jurusan_pilihan_pertama') || old('jurusan_pilihan_pertama')  == $item->id ? 'selected' : null }}>
                                    {{$item->jurusan->name}}</option>
                                @endforeach
                            </select>
                            @error('jurusan_pilihan_pertama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jurusan Pilihan kedua :</label>
                        <div class="col-sm-9">
                            <select name="jurusan_pilihan_kedua"
                                class="form-control jurusan_kedua @error('jurusan_pilihan_kedua') is-invalid @enderror">
                                <option value="">pilih</option>
                                @foreach ($jurusan as $item)
                                <option value="{{$item->id}}"
                                    {{session()->get('jurusan_pilihan_kedua') || old('jurusan_pilihan_kedua')  == $item->id ? 'selected' : null }}>
                                    {{$item->jurusan->name}}</option>
                                @endforeach
                            </select>
                            <p>tidak boleh dengan pilihan pertama</p>
                            @error('jurusan_pilihan_kedua')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <a href="{{route('pendaftaran-step-2')}}"
                                class="btn btn-secondary col-sm-6 col-md-2 mb-1">kembali</a>
                            <button class="col-sm-6 col-md-2 btn btn-primary float-right btn-lanjut">lanjut</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@push('javascript')

<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>

<script>
    const elJurusanPertama = document.getElementById('jurusan_pertama')
    const elJurusanKedua = document.querySelector('.jurusan_kedua')
    const btnLanjut = document.querySelector('.btn-lanjut')
    const from = document.getElementById('form-pendaftaran')

    btnLanjut.addEventListener('click', e => {
        e.preventDefault()

        Swal.fire({
            title: "Sudah yakin?",
            text: "Data akan periksa masukan data yang benar!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#58db83",
            cancelButtonColor: "#ec536c",
            confirmButtonText: "Yakin"
        }).then(function (result) {
            if (result.value) {
                from.submit()
            }
        });
    })

    elJurusanKedua.addEventListener('change', (e) => {
        if(elJurusanPertama.value == e.target.value) {
            Swal.fire({
                type: 'error',
                title: 'Tidak boleh...',
                text: 'jurusan pilihan kedua tidak boleh sama dengan jurusan pilihan pertama!',
            })
            btnLanjut.disabled = true
        }  else {
            btnLanjut.disabled = false
        }
    })

</script>


@endpush