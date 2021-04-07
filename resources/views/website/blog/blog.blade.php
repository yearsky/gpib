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
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Blog Post Area -->
            <div class="col-12 col-lg-8">
                <div class="row">
                    @foreach($berita as $br)
                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6">
                        <div class="single-blog-post mb-50">
                            <div class="post-thumbnail">
                                <a href="{{url('/Blog-detail/'.$br->id_berita)}}"><img src="{{$br->getImage()}}" alt=""></a>
                            </div>
                            <div class="post-content">
                                <a href="{{url('/Blog-detail/'.$br->id_berita)}}" class="post-title">
                                    <h4>{{$br->judul}}</h4>
                                </a>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{$br->author}}</a>
                                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{$br->date()}}</a>
                                </div>
                                <p class="post-excerpt">{!!limit($br->deskripsi)!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination-area">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{$berita->links()}}
                            
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-12 col-lg-3">
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
                    {{-- <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Categories</h6>
                        </div>
                        <ol class="crose-catagories">
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Religion</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Hope</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Donate</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Church</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Event</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Children</a></li>
                        </ol>
                    </div> --}}

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Recent News</h6>
                        </div>
                        @foreach($random as $rd)
                        <!-- Single Latest Posts -->
                        <div class="single-latest-post">
                            <a href="#" class="post-title">
                                <h6>{{$rd->judul}}</h6>
                            </a>
                            <p class="post-date">{{$rd->date()}}</p>
                        </div>
                        @endforeach
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    {{-- <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>Archives</h6>
                        </div>
                        <ol class="crose-archives">
                            <li><a href="#">July 2015</a></li>
                            <li><a href="#">March 2015</a></li>
                        </ol>
                    </div>

                    <!-- ##### Single Widget Area ##### -->
                    <div class="single-widget-area">
                        <!-- Title -->
                        <div class="widget-title">
                            <h6>popular tags</h6>
                        </div>
                        <!-- Tags -->
                        <ol class="popular-tags d-flex flex-wrap">
                            <li><a href="#">Sermons</a></li>
                            <li><a href="#">Cross</a></li>
                            <li><a href="#">Pray</a></li>
                            <li><a href="#">Holly Cross</a></li>
                            <li><a href="#">Event</a></li>
                        </ol>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection