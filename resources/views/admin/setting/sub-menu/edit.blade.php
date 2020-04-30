@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Sub Menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('sub-menu.index')}}">Menu</a></li>
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
                <form action="{{ route('sub-menu.update', ['sub_menu' => $submenu->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role_id" class="form-control">
                                <option value="">pilih</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}" {{$role->id == $submenu->role_id ? 'selected' : null}}>
                                    {{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <select name="menu" class="form-control">
                                @foreach ($menuItem as $item)
                                <option value="{{$item->id}}" {{$submenu->menu_id == $item->id ? 'selected' : null}}>
                                    {{$item->menu}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Parent Menu</label>
                        <div class="col-sm-10">
                            <select name="parent" class="form-control @error('parent')  is-invalid @enderror ">
                                <option value="0">None</option>
                                @foreach ($parentItem as $item)
                                <option value="{{$item->id}}" @if($submenu->parent_id == $item->id) selected
                                    @endif >{{$item->title}}</option>
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
                        <label class="col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror " name="title"
                                value="{{$submenu->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('url') is-invalid @enderror " name="url"
                                value="{{$submenu->url}}">
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('icon') is-invalid @enderror " name="icon"
                                value="{{$submenu->icon}}">
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