@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body">

        <div class="p-3">
            <h4 class="text-dark font-18 m-b-5 text-center">Selamat Datang</h4>
            <p class="text-dark-50 text-center">Daftar sekarang.</p>

            <form class="form-horizontal m-t-30" action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukan email" name="email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukan nama" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukan password" name="password" value="{{old('password')}}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control " placeholder="Masukan konfirmasi password"
                        name="password_confirmation">
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-12 text-right">

                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Daftar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="m-t-40 text-center">
    <p>Punya akun ? <a href="{{route('login')}}" class="text-primary"> Masuk Sekarang </a> </p>
    <p>© {{date('Y')}} {{config('app.name')}}. Crafted with <i class="mdi mdi-heart text-danger"></i> by
        Supryanto</p>
</div>

@endsection