@extends('layouts.front')

@section('content')

<style>
    .disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.5;
    }
</style>

<!-- ##### Popular Courses Start ##### -->
<section class="popular-courses-area section-padding-100-0"
    style="background-image: url({{asset('assets/front/img/core-img/texture.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Daftar Peserta Didik Baru</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Popular Course -->

            @forelse ($tahunAjaran as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <img src="{{asset('assets/front/img/bg-img/c1.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>{{$item->title}}</h4>
                        <div class="meta d-flex align-items-center">
                            <p>{{$item->status}}</p>
                        </div>
                        <p>{{$item->info}}</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">

                        </div>
                        <div class="course-fee h-100">
                            <a href="{{route('register')}}"
                                class="free {{$item->status == 'dibuka' ? null : 'disabled'}}">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>tidak ada </p>
            @endforelse

        </div>
    </div>
</section>
<!-- ##### Popular Courses End ##### -->
@endsection