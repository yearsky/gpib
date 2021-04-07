@extends('website.layout.template')
@section('title','Warta Jemaat')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Warta Jemaat</li>
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
                    <h2>Warta Jemaat</h2>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($warta as $wr)
            <!-- Single Latest Sermons -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-latest-sermons mb-100">
                    <div class="sermons-thumbnail">
                        <img src="{{$wr->getImage()}}" alt="">
                        <!-- Date -->
                        {{-- <div class="sermons-date">
                            <h6><span>10</span>MAR</h6>
                        </div> --}}
                    </div>
                    <div class="sermons-content">
                        {{-- <a href="{{url('')}}"><h4>{{$wr->title}}</h4></a> --}}
                        <a class="word" href="//docs.google.com/gview?url=http://www.picssel.com/demos/downloads/Fancybox.doc&embedded=true"><h4>{{$wr->title}}</h4></a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Single Latest Sermons -->
        </div>

        <div class="pagination-area mb-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{$warta->links()}}
                    
                </ul>
            </nav>
        </div>
    </div>
</section>
@section('script')
<script>
$(document).ready(function() {
                  $(".word").fancybox({
                    'width': 600, // or whatever
                    'height': 320,
                    'type': 'iframe'
                  });
                  }); //  re
</script>
@endsection
@endsection