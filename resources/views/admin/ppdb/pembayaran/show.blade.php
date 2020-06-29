@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran PPDB</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin/ppdb')}}">Ppdb</a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/ppdb/pembayaran')}}">Pembayaran</a></li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Transaksi PPDB</h4>
            </div>
        </div>
    </div>
</div>
@endsection