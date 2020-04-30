@extends('layouts.app')

@push('css')

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
                <p>Data Siswa #1</p>

                <div class="mb-3">
                    <a class="btn btn-primary" href="{{route('calon-siswa.pendaftaran')}}">step 1</a>
                    <a class="btn btn-secondary " href="{{route('pendaftaran-step-2')}}">step 2</a>
                    <a class="btn btn-secondary" href="{{route('pendaftaran-step-3')}}">step 3</a>
                </div>

                @if (Session::has('errors'))
                <div class="alert alert-danger mb-3" role="alert">
                    <strong>Tidak bisa!</strong> harus isi form ini terlebih dahulu
                </div>
                @endif

                <form action="{{route('pendaftaran.data-siswa-1')}}" method="post">

                    @csrf

                    @component('components.form-group')
                    @slot('label', 'Nisn')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'No kk')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Nik Siswa')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Nama Siswa')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'No telepon siswa')
                    @slot('type', 'number')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Agama :</label>
                        <div class="col-sm-9">
                            <select name="agama" class="form-control @error('agama') is-invalid @enderror ">
                                <option value="">Pilih</option>
                                <option value="Islam"
                                    {{old('agama') || session()->get('agama') == 'Islam' ? 'selected' : null}}>Islam
                                </option>
                                <option value="Kristen"
                                    {{old('agama') || session()->get('agama') == 'Kristen' ? 'selected' : null}}>Kristen
                                </option>
                                <option value="Katolik"
                                    {{old('agama') || session()->get('agama') == 'Katolik' ? 'selected' : null}}>Katolik
                                </option>
                                <option value="Hindu"
                                    {{old('agama') || session()->get('agama') == 'Hindu' ? 'selected' : null}}>Hindu
                                </option>
                                <option value="Budha"
                                    {{old('agama') || session()->get('agama') == 'Budha' ? 'selected' : null}}>Budha
                                </option>
                                <option value="Kong Hu Cu"
                                    {{old('agama') || session()->get('agama') == 'Kong Hu Cu' ? 'selected' : null}}>Kong
                                    Hu Cu
                                </option>

                            </select>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Kelamin :</label>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror ">
                                <option value="">Pilih</option>
                                <option value="laki-laki"
                                    {{session()->get('jenis_kelamin') || old('jenis_kelamin')  == 'laki-laki' ? 'selected' : null}}>
                                    Laki Laki
                                </option>
                                <option value="perempuan"
                                    {{session()->get('jenis_kelamin') || old('jenis_kelamin') == 'perempuan' ? 'selected' : null}}>
                                    Perempuan
                                </option>

                            </select>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'Tempat Lahir')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    placeholder="masukan tanggal lahir" id="date-picker" name="tanggal_lahir"
                                    value="{{ session()->get(Str::snake('tanggal_lahir')) ? session()->get(Str::snake('tanggal_lahir')) : old('tanggal_lahir')}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div><!-- input-group -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat Siswa :</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('alamat_siswa') is-invalid @enderror " rows="3"
                                placeholder="masukan alamat siswa"
                                name="alamat_siswa">{{ session()->get(Str::snake('alamat_siswa')) ? session()->get(Str::snake('alamat_siswa')) : old(Str::snake('alamat_siswa'))}}</textarea>
                            @error('alamat_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Anak ke :</label>
                        <div class="col">
                            <input type="number" class="form-control @error('anak_ke') is-invalid @enderror "
                                placeholder="anak keberapa" name="anak_ke"
                                value="{{ session()->get(Str::snake('anak_ke')) ? session()->get(Str::snake('anak_ke')) : old(Str::snake('anak_ke'))}}">
                            @error('anak_ke')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="number" class="form-control @error('jumlah_saudara') is-invalid @enderror "
                                placeholder="jumlah saudara" name="jumlah_saudara"
                                value="{{ session()->get(Str::snake('jumlah_saudara')) ? session()->get(Str::snake('jumlah_saudara')) : old(Str::snake('jumlah_saudara'))}}">
                            @error('jumlah_saudara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'Hobi')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Cita Cita')
                    @endcomponent

                    <div class="form-group row">
                        <div class="col-12">
                            <button class="col-sm-6 col-lg-2 btn btn-primary float-right">lanjut</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@push('javascript')

<script src="{{asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
<script>
    $('#date-picker').datepicker({
    format: 'yyyy-mm-dd',
    });
</script>
@endpush