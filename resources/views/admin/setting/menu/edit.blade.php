@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('menu.index')}}">Menu</a></li>
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
                <form action="{{ route('menu.update', ['menu' => $menuItem->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Masukkan menu" name='menu'
                                value="{{ $menuItem->menu }}">
                        </div>
                    </div>
                    <button type="submit" class='btn btn-primary float-right'>Submit</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection