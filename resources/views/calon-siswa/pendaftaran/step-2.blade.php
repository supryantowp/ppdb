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
                <p>Data Orang Tua #2</p>

                <div class="mb-3">
                    <a class="btn btn-secondary" href="{{route('calon-siswa.pendaftaran')}}">step 1</a>
                    <a class="btn btn-primary" href="{{route('pendaftaran-step-2')}}">step 2</a>
                    <a class="btn btn-secondary" href="{{route('pendaftaran-step-3')}}">step 3</a>
                </div>

                @if (Session::has('errors'))
                <div class="alert alert-danger mb-3" role="alert">
                    <strong>Tidak bisa!</strong> harus isi form ini terlebih dahulu
                </div>
                @endif

                <form action="{{route('pendaftaran.data-siswa-2')}}" method="post">

                    @csrf

                    {{-- Ayah --}}

                    @component('components.form-group')
                    @slot('label', 'Nik ayah')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Nama ayah')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pendidikan ayah :</label>
                        <div class="col-sm-9">
                            <select name="pendidikan_ayah"
                                class="form-control @error('pendidikan_ayah') is-invalid @enderror">
                                <option value="">pilih</option>
                                <option value="tidak sekolah"
                                    {{old('pendidikan_ayah') == 'tidak sekolah' ? 'selected' : null}}>tidak sekolah
                                </option>
                                <option value="sd/mi"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 'sd/mi' ? 'selected' : null}}>
                                    SD/MI/</option>
                                <option value="smp/mts"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 'smp/mts' ? 'selected' : null}}>
                                    SMP/MTs </option>
                                <option value="smk/sma/ma"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 'smk/sma/ma' ? 'selected' : null}}>
                                    SMK/SMA/MA
                                </option>
                                <option value="diploma"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 'diploma' ? 'selected' : null}}>
                                    Diploma</option>
                                <option value="s1"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 's1' ? 'selected' : null}}>
                                    S1
                                </option>
                                <option value="s2"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 's2' ? 'selected' : null}}>
                                    S2
                                </option>
                                <option value="s3"
                                    {{old('pendidikan_ayah') || session()->get('pendidikan_ayah') == 's3' ? 'selected' : null}}>
                                    S3</option>
                            </select>
                            @error('pendidikan_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Pekerjaan ayah :</label>
                        <div class="col-sm-9">
                            <select name="pekerjaan_ayah"
                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="Buruh"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Buruh' ? 'selected' : null}}>
                                    Buruh
                                </option>
                                <option value="Tani"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Tani' ? 'selected' : null}}>
                                    Tani
                                </option>
                                <option value="Wiraswata"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Wiraswata' ? 'selected' : null}}>
                                    Wiraswata</option>
                                <option value="Pns"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Pns' ? 'selected' : null}}>
                                    Pns</option>
                                <option value="Porli/Tni"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Porli/Tni' ? 'selected' : null}}>
                                    Porli/Tni</option>
                                <option value="Perangkat Desa"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Perangkat Desa' ? 'selected' : null}}>
                                    Perangkat Desa
                                </option>
                                <option value="Nelayan"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Nelayan' ? 'selected' : null}}>
                                    Nelayan</option>
                                <option value="Lainya"
                                    {{old('pekerjaan_ayah') || session()->get('pekerjaan_ayah') == 'Lainya' ? 'selected' : null}}>
                                    Lainya
                                </option>
                            </select>
                            @error('pekerjaan_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Penghasilan ayah :</label>
                        <div class="col-sm-9">
                            <select name="penghasilan_ayah"
                                class="form-control @error('penghasilan_ayah') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="-500rb"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '-500rb' ? 'selected' : null}}>
                                    -500rb</option>
                                <option value="500rb-1jt"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '500rb-1jt' ? 'selected' : null}}>
                                    500rb-1jt</option>
                                <option value="1jt-3jt"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '1jt-3jt' ? 'selected' : null}}>
                                    1jt-3jt</option>
                                <option value="3jt-5jt"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '3jt-5jt' ? 'selected' : null}}>
                                    3jt-5jt</option>
                                <option value="5jt-10jt"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '5jt-10jt' ? 'selected' : null}}>
                                    5jt-10jt</option>
                                <option value="10jt++"
                                    {{old('penghasilan_ayah') || session()->get('penghasilan_ayah') == '10jt' ? 'selected' : null}}>
                                    10jt++
                                </option>
                            </select>
                            @error('penghasilan_ayah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'No telepon ayah')
                    @slot('type', 'number')
                    @endcomponent

                    {{-- Ibu --}}
                    <hr>

                    @component('components.form-group')
                    @slot('label', 'Nik ibu')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Nama ibu')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pendidikan ibu :</label>
                        <div class="col-sm-9">
                            <select name="pendidikan_ibu"
                                class="form-control @error('pendidikan_ibu') is-invalid @enderror">
                                <option value="">pilih</option>
                                <option value="tidak sekolah"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 'tidak sekolah' ? 'selected' : null}}>
                                    tidak sekolah
                                </option>
                                <option value="sd/mi"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 'sd/mi' ? 'selected' : null}}>
                                    SD/MI/</option>
                                <option value="smp/mts"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 'smp/mts' ? 'selected' : null}}>
                                    SMP/MTs </option>
                                <option value="smk/sma/ma"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 'smk/sma/ma' ? 'selected' : null}}>
                                    SMK/SMA/MA
                                </option>
                                <option value="diploma"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 'diploma' ? 'selected' : null}}>
                                    Diploma</option>
                                <option value="s1"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 's1' ? 'selected' : null}}>
                                    S1
                                </option>
                                <option value="s2"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 's2' ? 'selected' : null}}>
                                    S2
                                </option>
                                <option value="s3"
                                    {{old('pendidikan_ibu') || session()->get('pendidikan_ibu') == 's3' ? 'selected' : null}}>
                                    S3</option>
                            </select>
                            @error('pendidikan_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Pekerjaan ibu :</label>
                        <div class="col-sm-9">
                            <select name="pekerjaan_ibu"
                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="Ibu rumah tangga"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Ibu rumah tangga' ? 'selected' : null}}>
                                    Ibu rumah tangga
                                </option>
                                <option value="Buruh"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Buruh' ? 'selected' : null}}>
                                    Buruh
                                </option>
                                <option value="Tani"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Tani' ? 'selected' : null}}>
                                    Tani
                                </option>
                                <option value="Wiraswata"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Wiraswata' ? 'selected' : null}}>
                                    Wiraswata</option>
                                <option value="Pns"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Pns' ? 'selected' : null}}>
                                    Pns</option>
                                <option value="Porli/Tni"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Porli/Tni' ? 'selected' : null}}>
                                    Porli/Tni</option>
                                <option value="Perangkat Desa"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Perangkat Desa' ? 'selected' : null}}>
                                    Perangkat Desa
                                </option>
                                <option value="Nelayan"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Nelayan' ? 'selected' : null}}>
                                    Nelayan</option>
                                <option value="Lainya"
                                    {{old('pekerjaan_ibu') || session()->get('pekerjaan_ibu') == 'Lainya' ? 'selected' : null}}>
                                    Lainya
                                </option>
                            </select>
                            @error('pekerjaan_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Penghasilan ibu :</label>
                        <div class="col-sm-9">
                            <select name="penghasilan_ibu"
                                class="form-control @error('penghasilan_ibu') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="-500rb"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '-500rb' ? 'selected' : null}}>
                                    -500rb</option>
                                <option value="500rb-1jt"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '500rb-1jt' ? 'selected' : null}}>
                                    500rb-1jt</option>
                                <option value="1jt-3jt"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '1jt-3jt' ? 'selected' : null}}>
                                    1jt-3jt</option>
                                <option value="3jt-5jt"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '3jt-5jt' ? 'selected' : null}}>
                                    3jt-5jt</option>
                                <option value="5jt-10jt"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '5jt-10jt' ? 'selected' : null}}>
                                    5jt-10jt</option>
                                <option value="10jt++"
                                    {{old('penghasilan_ibu') || session()->get('penghasilan_ibu') == '10jt' ? 'selected' : null}}>
                                    10jt++
                                </option>
                            </select>
                            @error('penghasilan_ibu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'No telepon ibu')
                    @slot('type', 'number')
                    @endcomponent

                    {{-- Wali --}}
                    <hr>

                    <p>Data wali diisi jika memang ada wali, jika tidak ada tidak perlu diisi. Pilihan ini bersifat
                        optional</p>

                    @component('components.form-group')
                    @slot('label', 'Nik wali')
                    @slot('type', 'number')
                    @endcomponent

                    @component('components.form-group')
                    @slot('label', 'Nama wali')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pendidikan wali :</label>
                        <div class="col-sm-9">
                            <select name="pendidikan_wali"
                                class="form-control @error('pendidikan_wali') is-invalid @enderror">
                                <option value="">pilih</option>
                                <option value="tidak sekolah">tidak sekolah</option>
                                <option value="sd/mi">SD/MI/</option>
                                <option value="smp/mts">SMP/MTs </option>
                                <option value="smk/sma/ma">SMK/SMA/MA</option>
                                <option value="diploma">Diploma</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                            @error('pendidikan_wali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Pekerjaan wali :</label>
                        <div class="col-sm-9">
                            <select name="pekerjaan_wali"
                                class="form-control @error('pekerjaan_wali') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Tani">Tani</option>
                                <option value="Wiraswata">Wiraswata</option>
                                <option value="Pns">Pns</option>
                                <option value="Porli/Tni">Porli/Tni</option>
                                <option value="Perangkat Desa">Perangkat Desa</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Lainya">Lainya</option>
                            </select>
                            @error('pekerjaan_wali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Penghasilan wali :</label>
                        <div class="col-sm-9">
                            <select name="penghasilan_wali"
                                class="form-control @error('penghasilan_wali') is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="-500rb">-500rb</option>
                                <option value="500rb-1jt">500rb-1jt</option>
                                <option value="1jt-3jt">1jt-3jt</option>
                                <option value="3jt-5jt">3jt-5jt</option>
                                <option value="5jt-10jt">5jt-10jt</option>
                                <option value="10jt++">10jt++</option>
                            </select>
                            @error('penghasilan_wali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'No telepon wali')
                    @endcomponent

                    <div class="form-group row">
                        <div class="col-12">
                            <a href="{{route('calon-siswa.pendaftaran')}}"
                                class="btn btn-secondary col-sm-6 col-md-2 mb-1">kembali</a>
                            <button class="col-sm-6 col-md-2 btn btn-primary float-right">lanjut</button>
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
    format: 'mm/dd/yyyy',
    });
</script>
@endpush