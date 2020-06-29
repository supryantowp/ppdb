@extends('layouts.front')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area">
    <!-- Breadcumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('materi')}}">Courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Art &amp; Design</li>
        </ol>
    </nav>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Catagory ##### -->
<div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3"
    style="background-image: url({{asset('assets/front/img/bg-img/bg2.jpg')}});">
    <h3>Art &amp; Design</h3>
</div>

<!-- ##### Popular Course Area Start ##### -->
<section class="popular-courses-area section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <img src="{{asset('assets/front/img/bg-img/c1.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>English Grammar</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#" class="free">Free</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="{{asset('assets/front/img/bg-img/c2.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Vocabulary</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$20</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <img src="{{asset('assets/front/img/bg-img/c3.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Expository writing</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$45</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <img src="{{asset('assets/front/img/bg-img/c4.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Vocabulary</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$45</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="{{asset('assets/front/img/bg-img/c5.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>English Grammer</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#" class="free">Free</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <img src="{{asset('assets/front/img/bg-img/c6.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Expository writing</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$45</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <img src="{{asset('assets/front/img/bg-img/c7.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>English Grammer</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#" class="free">Free</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="{{asset('assets/front/img/bg-img/c8.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Vocabulary</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$20</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <img src="{{asset('assets/front/img/bg-img/c9.jpg')}}" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Expository writing</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$45</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="load-more text-center wow fadeInUp" data-wow-delay="1000ms">
                    <a href="#" class="btn clever-btn btn-2">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Popular Course Area End ##### -->
@endsection