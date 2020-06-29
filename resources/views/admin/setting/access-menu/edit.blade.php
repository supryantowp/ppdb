@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Access menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('access-menu.index')}}">Access Menu</a></li>
                <li class="breadcrumb-item">Edit</li>
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

                <h4 class="mt-0 mb-4 header-title">Ubah Menu</h4>
                <form action="{{ route('access-menu.update', ['access_menu' => $acMenu->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10">
                            <select name="role" class="form-control @error('role') is-invalid @enderror ">
                                @foreach ($role as $item)
                                <option value="{{$item->id}}" @if($acMenu->role->id == $item->id ) selected @endif >
                                    {{$item->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Menu</label>
                        <div class="col-sm-10">
                            <select name="menu" class="form-control @error('menu') is-invalid @enderror ">
                                @foreach ($itemMenu as $item)
                                <option value="{{$item->id}}" @if($acMenu->menu->id == $item->id) selected @endif
                                    >{{$item->menu}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class='btn btn-primary float-right col-sm-12 col-md-2'>update</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection