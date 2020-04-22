@extends('layouts.auth')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="p-3">
            <h4 class=" font-18 m-b-5 text-center">Selamat datang kembali !</h4>
            <p class="text-dark-50 text-center">Masuk untuk melanjutkan.</p>

            <form class="form-horizontal m-t-30" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror " id="email"
                        placeholder="Masukan email" name="email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="current-password" placeholder="Masukan password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                        <a href="{{route('password.request')}}" class="text-white-50"><i class="mdi mdi-lock"></i> Lupa
                            password?</a>
                        @endif
                    </div>

                </div>
                <div class="form-group row m-t-20">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Ingatkan saya</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-12 m-t-20">
                        <a href="{{url('password/reset')}}" class="text-muted"><i class="mdi mdi-lock"></i> Lupa
                            password
                            ?</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<div class="m-t-40 text-center">
    <p>Tidak punya akun ? <a href="{{route('register')}}" class="text-primary"> Daftar Sekarang </a> </p>
    <p>© {{date('Y')}} {{config('app.name')}}. Crafted with <i class="mdi mdi-heart text-danger"></i> by
        Supryanto</p>
</div>


@endsection