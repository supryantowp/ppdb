@extends('layouts.front')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area">
    <!-- Breadcumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Art &amp; Design</li>
        </ol>
    </nav>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Instructors Video Start ##### -->
<div class="instructors-video d-flex align-items-center justify-content-center bg-img"
    style="background-image: url({{asset('assets/front/img/bg-img/bg4.jpg')}});">
    <h2>Be The Best Teacher</h2>
    <!-- video btn -->
    <a href="https://www.youtube.com/watch?v=qC_T9ePzANg" class="video-btn"><i class="fa fa-play"
            aria-hidden="true"></i></a>
</div>
<!-- ##### Instructors Video End ##### -->

<!-- ##### Best Tutors Area Start ##### -->
<section class="best-tutors-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>The Best Tutors in Town</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tutors-slide owl-carousel">

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="{{asset('assets/front/img/bg-img/t1.png')}}" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="{{asset('assets/front/img/bg-img/t2.png')}}" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="{{asset('assets/front/img/bg-img/t3.png')}}" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="{{asset('assets/front/img/bg-img/t4.png')}}" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="{{asset('assets/front/img/bg-img/t5.png')}}" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Best Tutors Area End ##### -->

<!-- ##### Top Teacher Area Start ##### -->
<section class="top-teacher-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Top Teachers in Every Field</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t1.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t2.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t3.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t4.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t5.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t1.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t2.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t3.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>

            <!-- Single Teacher -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-instructor d-flex align-items-center mb-30">
                    <div class="instructor-thumb">
                        <img src="{{asset('assets/front/img/bg-img/t4.png')}}" alt="">
                    </div>
                    <div class="instructor-info">
                        <h5>Sarah Parker</h5>
                        <span>Teacher</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Top Teacher Area End ##### -->
@endsection