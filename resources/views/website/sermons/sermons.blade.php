@extends('website.layout.template')
@section('title','Khotbah')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Khotbah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="latest-sermons-area">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Popular Sermons</h2>
                    <p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Latest Sermons -->
            @foreach($sermons as $sm)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-latest-sermons mb-100">
                    <div class="sermons-thumbnail">
                        <img src="{{$sm->getImage()}}" alt="Picture">
                        <!-- Date -->
                        <div class="sermons-date">
                            <h6><span>{{$sm->getTgl()}}</span>{{$sm->getBt()}}</h6>
                        </div>
                    </div>
                    <div class="sermons-content">
                        {{-- <div class="sermons-cata">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Docs"><i class="fa fa-file" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                        </div> --}}
                        <h4><a href="{{url('/sermons-detail/'.$sm->id)}}">{!!limit($sm->deskripsi)!!}</a></h4>
                        <div class="sermons-meta-data">
                            <p><i class="fa fa-user" aria-hidden="true"></i> Sermon From: <span>{{$sm->from_sermons}}</span></p>
                            <p><i class="fa fa-tag" aria-hidden="true"></i> Categories: <span>{{$sm->kategori}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-area">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{$sermons->links()}}
                    
                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection