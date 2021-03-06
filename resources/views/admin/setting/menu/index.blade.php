@extends('layouts.app')

@push('css')

<!-- Sweet Alert --->
<link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">

@endpush

@section('title')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Menu</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item">Menu</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Menu</h4>
                <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh Menu</p>

                <div class="card-actions ">
                    <a class='btn btn-primary float-left' href="{{ route('menu.create') }}">
                        <i class='mdi mdi-plus'></i>
                    </a>
                    <form action="" method="get" class='form-inline float-right mb-3'>
                        <input type="text" class="form-control" placeholder='Cari menu..' name='search'>
                        <button type="submit" class='btn btn-primary'>Cari</button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iMenu as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->menu}}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('menu.edit', ['menu' => $item->id]) }}"
                                            class="btn btn-icon btn-warning mr-2"><i
                                                class="mdi mdi-tooltip-edit"></i></a>

                                        <form action="{{route('menu.destroy', ['menu' => $item->id])}}" method="post"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-danger btn-delete"><i
                                                    class="mdi mdi-delete "></i></button>
                                        </form>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$iMenu->links()}}
            </div>
        </div>
    </div>
</div>
@endsection


@push('javascript')

<!-- Sweet Alert --->
<script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>

<!-- Delete Alert --->
<script src="{{asset('js/component/delete_alert.js')}}"></script>

<!-- Alert --->
@include('layouts.partial._alert')

@include('layouts.partial._datatable')

@endpush