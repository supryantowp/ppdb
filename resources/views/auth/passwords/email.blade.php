@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body">

        <div class="p-3">
            <h4 class="text-muted font-18 mb-3 text-center">Ubah Password</h4>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form class="form-horizontal m-t-30" action="{{route('password.email')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="useremail">Email</label>
                    <input type="email" class="form-control" id="useremail" placeholder="Masukan email" name="email"
                        value="{{old('email')}}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
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