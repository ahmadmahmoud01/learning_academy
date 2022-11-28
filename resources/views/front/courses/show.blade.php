@extends('front.layout')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Course Details</h2>
                        <p>HomePage<span>/</span>Courses<span>/</span>{{ $course->category->name }}<span>/</span>{{ $course->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================ Start Course Details Area =================-->
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    {{-- <img class="img-fluid w-80 h-50" src='{{ asset("uploads/courses/$course->img") }}' alt=""> --}}
                    <img class="img-fluid" src='{{ asset("img/single_project.png") }}' alt="">
                </div>
                <div class="content_wrapper">
                   {!! $course->desc !!}
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Trainer’s Name</p>
                                <span class="color">{{ $course->trainer->name }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Course Fee </p>
                                <span>${{ $course->price }}</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!--================ End Course Details Area =================-->




@endsection
