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
                        <li class="breadcrumb-item"><a href="{{url('/Blog')}}">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="sermons-details-area section-padding-100">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Blog Posts Area -->
            <div class="col-12 col-lg-8">
                <div class="sermons-details-area">

                    <!-- Sermons Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">
                            <h2 class="post-title mb-30">{{$berita->judul}}</h2>
                            <img class="mb-30" src="{{$berita->getImage()}}" alt="">
                            <!-- Catagory & Share -->
                            <div class="catagory-share-meta d-flex flex-wrap justify-content-between align-items-center">
                                <!-- Share -->
                                <div class="share">
                                    <span>Share:</span>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            {!!$berita->deskripsi!!}
                            {{-- <blockquote>
                                <div class="blockquote-text">
                                    <h6>“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.” </h6>
                                    <h6>Ollie Schneider - <span>Parson</span></h6>
                                </div>
                            </blockquote> --}}
                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    {{-- <div class="comment_area clearfix">
                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="img/bg-img/28.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <span class="comment-date">March 15, 2018</span>
                                        <h5>Lena Headey</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore.</p>
                                        <a href="#">Like</a>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>

                    <!-- Leave A Comment -->
                    <div class="leave-comment-area mt-50 clearfix">
                        <div class="comment-form">
                            <h4 class="headline">Leave A Comment</h4>
                            <!-- Contact Form Area -->
                            <div class="contact-form-area">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="contact-name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="contact-email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="contact-number" placeholder="Website">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn crose-btn mt-15">Post Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Blog Sidebar Area -->
            <div class="col-12 col-sm-9 col-md-6 col-lg-3">
                <div class="post-sidebar-area">

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                        <div class="search-form">
                            <form action="#" method="get">
                                <input type="search" name="search" placeholder="Search Here">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Lihat Juga</h6>
                        </div>
                        @foreach($random as $rd)
                        <!-- Single Latest Posts -->
                        <div class="single-latest-post">
                            <a href="{{url('/Blog-detail/'.$rd->id_berita)}}" class="post-title">
                                <h6>{{$rd->judul}}</h6>
                            </a>
                            {!!limit($rd->deskripsi)!!}
                            <div class="sermons-meta-data">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Author: <span>{{$rd->author}}</span></p>
                                {{-- <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{$sermons->getBt()}} on <span>9:00 am - 11:00 am</span></p> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    {{-- <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Sermon Speaker</h6>
                        </div>
                        <ol class="crose-catagories">
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Kyleigh Lam</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Thomas Jack</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Garry Rick</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> John Smith</a></li>
                        </ol>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection