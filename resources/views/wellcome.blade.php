@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran</h4>
            <p>Untuk biaya pendaftaran adalah <strong>Rp 3.000.000</strong></p>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-2">
            <div class="card-body">

                <h4 class="mt-0 header-title">Hai, {{Str::title(Auth::user()->name)}} 👋🏻</h4>

                <hr>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis doloremque repudiandae distinctio
                    exercitationem mollitia eius quo quia ex animi reprehenderit.</p>

            </div>
        </div>
    </div>
</div>
@endsection