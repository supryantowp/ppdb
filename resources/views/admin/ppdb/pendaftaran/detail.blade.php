@extends('layouts.app')

@push('css')
<!-- Magnific popup -->
<link href="{{asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">
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
                <li class="breadcrumb-item"><a href="{{route('konfirmasi.index')}}">Pendaftaran</a></li>
                <li class="breadcrumb-item active">Detail Pendaftaran</li>
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
                <h4 class="header-title">Data Pendaftaran</h4>

                <div class="mt-4 row">

                    <div class="col-md-6 col-sm-12">
                        <div class="image" style="width: 100%">
                            <a class="image-popup-vertical-fit" href="{{$ppdb->fotoSiswa()}}"
                                title="{{$ppdb->nama_siswa}}.">
                                <img class="img-thumbnail" alt="" src="{{$ppdb->fotoSiswa()}}" width="145">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        @component('components.input-value')
                        @slot('label', 'No Pbbd')
                        @slot('value', $ppdb->no_ppdb)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nama Siswa')
                        @slot('value', $ppdb->nama_siswa)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Jurusan Pertama')
                        @slot('value', $ppdb->jurusan->name)
                        @endcomponent

                        <div class="d-flex">
                            <form id="frmTerima"
                                action="{{route('konfirmasi.update', ['konfirmasi' => $ppdb->no_ppdb])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="diterima">
                                <button class="btn btn-success btn-terima mr-1">terima</button>
                            </form>
                            <form id="frmTidakTerima"
                                action="{{route('konfirmasi.update', ['konfirmasi' => $ppdb->no_ppdb])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="tidak diterima">
                                <button class="btn btn-danger btn-tidak">tidak diterima</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3 col-sm-12">

                        <h5 class="header-title mb-3"># Data Pribadi</h5>

                        @component('components.input-value')
                        @slot('label', 'No Pbbd')
                        @slot('value', $ppdb->no_ppdb)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nisn')
                        @slot('value', $ppdb->nisn)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Kk')
                        @slot('value', $ppdb->no_kk)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nik Siswa')
                        @slot('value', $ppdb->nik_siswa)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nama Siswa')
                        @slot('value', $ppdb->nama_siswa)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Agama')
                        @slot('value', $ppdb->agama)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Jenis Kelamin')
                        @slot('value', $ppdb->jenis_kelamin)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Tempat Lahir')
                        @slot('value', $ppdb->tempat_lahir)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Tanggal Lahir')
                        @slot('value', $ppdb->tanggal_lahir)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Alamat Siswa')
                        @slot('value', $ppdb->alamat_siswa)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Telepon')
                        @slot('value', $ppdb->no_telepon_siswa)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Anak ke')
                        @slot('value', $ppdb->anak_ke)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Jumlah Saudara')
                        @slot('value', $ppdb->jumlah_saudara)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Hobi')
                        @slot('value', $ppdb->hobi)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Hobi')
                        @slot('value', $ppdb->cita_cita)
                        @endcomponent

                    </div>
                    <div class="col-md-6 mt-3 col-sm-12">

                        <h5 class="header-title mb-3"># Data Orang Tua / Wali</h5>

                        @component('components.input-value')
                        @slot('label', 'Nik Ayah')
                        @slot('value', $ppdb->nik_ayah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nama Ayah')
                        @slot('value', $ppdb->nama_ayah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pendidikan Ayah')
                        @slot('value', $ppdb->pendidikan_ayah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pekerjaan Ayah')
                        @slot('value', $ppdb->pekerjaan_ayah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Penghasilan Ayah')
                        @slot('value', $ppdb->penghasilan_ayah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Telepon Ayah')
                        @slot('value', $ppdb->no_telepon_ayah)
                        @endcomponent

                        {{-- Ibu --}}
                        @component('components.input-value')
                        @slot('label', 'Nik Ibu')
                        @slot('value', $ppdb->nik_ibu)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nama Ibu')
                        @slot('value', $ppdb->nama_ibu)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pendidikan Ibu')
                        @slot('value', $ppdb->pendidikan_ibu)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pekerjaan Ibu')
                        @slot('value', $ppdb->pekerjaan_ibu)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Penghasilan Ibu')
                        @slot('value', $ppdb->penghasilan_ibu)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Telepon Ibu')
                        @slot('value', $ppdb->no_telepon_ibu)
                        @endcomponent

                        {{-- wali --}}

                        @component('components.input-value')
                        @slot('label', 'Nik Wali')
                        @slot('value', $ppdb->nik_wali)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Nama Wali')
                        @slot('value', $ppdb->nama_wali)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pendidikan Wali')
                        @slot('value', $ppdb->pendidikan_wali)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Pekerjaan Wali')
                        @slot('value', $ppdb->pekerjaan_wali)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Penghasilan Wali')
                        @slot('value', $ppdb->penghasilan_wali)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Telepon Wali')
                        @slot('value', $ppdb->no_telepon_wali)
                        @endcomponent


                    </div>
                    <div class="col-md-6 mt-3 col-sm-12">
                        <h5 class="header-title mb-3"># Data Sekolah</h5>

                        @component('components.input-value')
                        @slot('label', 'Npsn Sekolah')
                        @slot('value', $ppdb->npsn_sekolah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Asal Sekolah')
                        @slot('value', $ppdb->asal_sekolah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Asal Sekolah')
                        @slot('value', $ppdb->asal_sekolah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Alamat Sekolah')
                        @slot('value', $ppdb->alamat_sekolah)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'No Skhun')
                        @slot('value', $ppdb->no_skhun)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Tinggal Dengan')
                        @slot('value', $ppdb->tinggal_dengan)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Jurusan Pertama')
                        @slot('value', $ppdb->jurusan->name)
                        @endcomponent

                        @component('components.input-value')
                        @slot('label', 'Jurusan Kedua')
                        @slot('value', $ppdb->jurusan2->name)
                        @endcomponent

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<!-- Magnific popup -->
<script src="{{asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Sweet Alert --->
<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

<script>
    $('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
    });

</script>

<script src="{{asset('js/component/konfirmasi_siswa.js')}}"></script>

@endpush