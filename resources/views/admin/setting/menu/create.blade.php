@extends('layouts.app')

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('menu.index')}}">Menu</a></li>
                <li class="breadcrumb-item active">Tambah</li>
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

                <h4 class="mt-0 mb-4 header-title">Tambah Menu</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure repellat atque repudiandae officia
                    perspiciatis ipsa ducimus? Molestiae dolorem vitae tempore.</p>

                <form action="{{ route('menu.store') }}" method="post">
                    @csrf

                    @component('components.form-group')
                    @slot('label', 'menu')
                    @endcomponent

                    <button type="submit" class='btn btn-primary float-right col-sm-12 col-md-2'>tambah</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection