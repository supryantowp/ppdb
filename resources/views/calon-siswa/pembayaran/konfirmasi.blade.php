@extends('layouts.app')

@push('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Konfirmasi Pembayaran</h4>
            <p>Untuk biaya pendaftaran adalah <strong>{{$hargaPpdb->fmtHarga()}}</strong></p>
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

                <p class="text-danger">Total yang harus di bayar <strong>{{$hargaPpdb->fmtHarga()}}</strong></p>

                <p>Isi form dibawah masukan data yang sesuai</p>

                <form action="{{route('pembayaran.store-siswa')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3">Sisa Harus dibayar</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="" readonly
                                value="Rp. {{number_format($sisa_yang_harus_dibayar)}}">
                            <input type="hidden" class="form-control" name="yang_harus_dibayar"
                                value="{{$sisa_yang_harus_dibayar}}">
                        </div>
                    </div>

                    @component('components.form-group')
                    @slot('label', 'Nama')
                    @endcomponent

                    <div class="form-group row">
                        <label class="col-sm-3">Bayar</label>
                        <div class="col-sm-9">
                            <select class="form-control select2 @error('jumlah_bayar') is-invalid @enderror"
                                name="jumlah_bayar">
                                <option value="">pilih</option>
                                <option value="200000">Rp 200.000</option>
                                <option value="300000">Rp 300.000</option>
                                <option value="500000">Rp 500.000</option>
                                <option value="700000">Rp 700.000</option>
                                <option value="1000000">Rp 1.000.000</option>
                                <option value="1500000">Rp 1.500.000</option>
                                <option value="2000000">Rp 2.000.000</option>
                                <option value="2500000">Rp 2.500.000</option>
                                <option value="3000000">Rp 3.000.000</option>
                            </select>
                            @error('jumlah_bayar')
                            <span class="feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Rekening Tujuan</label>
                        <div class="col-sm-9">
                            <select name="bank_id" class="form-control @error('bank_id') is-invalid @enderror">
                                <option value="">pilih</option>
                                @foreach ($banks as $bank)
                                <option value="{{$bank->id}}" {{old('bank_id') == $bank->id ? 'selected' : null}}>
                                    {{$bank->nama_bank}} / {{$bank->atas_nama}}</option>
                                @endforeach
                            </select>
                            @error('bank_id')
                            <span class="feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Bukti Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="file" class="filestyle @error('bukti_pembayaran') is-invalid @enderror"
                                data-buttonname="btn-secondary" name="bukti_pembayaran">
                            <strong>Max. 2MB. Format JPG, JPEG, PNG.</strong>
                            <br>
                            @error('bukti_pembayaran')
                            <span class="feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <button class="col-sm-6 col-md-2 btn btn-primary float-right btn-lanjut">lanjut</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script>
    $(".select2").select2();
</script>
@endpush