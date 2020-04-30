@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Sub Menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('sub-menu.index')}}">Sub Menu</a></li>
                <li class="breadcrumb-item">Tambah</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 mb-4 header-title">Tambah Sub Menu</h4>
                <form action="{{ route('sub-menu.store') }}" method="post">
                    @csrf

                    <div class="from-group row">
                        <label class="col-sm-3">Role</label>
                        <div class="col-sm-9 mb-3">
                            <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                <option value="">pilih</option>
                                @foreach ($roles as $item)
                                <option value="{{$item->id}}" {{old('role_id') == $item->id ? 'selected' : null}}>
                                    {{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Menu</label>
                        <div class="col-sm-9">
                            <select name="menu" class="form-control @error('menu')  is-invalid @enderror ">
                                <option value="">pilih</option>
                                @foreach ($menuItem as $item)
                                <option value="{{$item->id}}" {{old('menu') == $item->id ? 'selected' : null}}>
                                    {{$item->menu}}</option>
                                @endforeach

                            </select>
                            @error('menu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Parent Menu</label>
                        <div class="col-sm-9">
                            <select name="parent" class="form-control @error('parent')  is-invalid @enderror ">
                                <option value="">pilih</option>
                                <option value="0">kosong</option>
                                @foreach ($parentItem as $item)
                                <option value="{{$item->id}}" {{old('parent') == $item->id ? 'selected' : null}}>
                                    {{$item->title}}</option>
                                @endforeach

                            </select>
                            @error('parent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('title')  is-invalid @enderror " name="title"
                                value="{{old('title')}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Url</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('url')  is-invalid @enderror " name="url"
                                value="{{old('url')}}">
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Icon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('icon')  is-invalid @enderror " name="icon"
                                value="{{old('icon')}}">
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class='btn btn-primary float-right'>Submit</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection