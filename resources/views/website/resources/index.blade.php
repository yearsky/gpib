@extends('website.layout.template')
@section('title','Blog')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Resources</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="about-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Resources</h2>
                </div>
            </div>
        </div>

        <div class="row about-content justify-content-center">
            <!-- Single About Us Content -->

            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('assets/img/bg-img/4.jpg')}}" alt="">
                    <div class="about-text">
                        <h4>Pendalaman Alkitab</h4>
                        <a href="/Resources/pendalaman-alkitab">Read More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Single About Us Content -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="about-us-content mb-100">
                    <img src="{{asset('images/resources/news.png')}}" alt="">
                    <div class="about-text">
                        <h4>Bahan Katekisasi</h4>
                        <p></p>
                        <a href="/Resources/bahan-katekisasi">Read More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection