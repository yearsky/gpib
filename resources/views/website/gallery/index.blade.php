@extends('website.layout.template')
@section('title','Gallery')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                    <h2>Gallery</h2>
                    <p></p>
                </div>
            </div>
        </div>

       
	
        <h3>A Four Image Set</h3>
    {{-- <div class="post-thumbnail">
        @foreach($gallery as $gl)
      <a class="example-image-link" href="{{$gl->getImage()}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="post-thumbnail" src="{{$gl->getImage()}}" alt="Picture"/></a>
        @endforeach
    </div> --}}
    <div class="row">
    @foreach($gallery as $gl)
    <div class="col-10 col-sm-6">
        <div class="single-blog-post mb-5">
            <div class="post-thumbnail">
                <a class="example-image-link" href="{{$gl->getImage()}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                    <img class="post-thumbnail" src="{{$gl->getImage()}}" style="max-width: 400px;height: auto;" alt="Picture"/></a>
            </div>
        </div>  
    </div>
    @endforeach   
</div> 

        <div class="pagination-area mb-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{-- {{$gallery->links()}} --}}
                    
                </ul>
            </nav>
        </div>
    </div>
</section>
@section('script')
<script src="{{asset('assets/js/lightbox.js')}}"></script>
<script>
    lightbox.option({
      'fitImagesInViewport': true,
      
      'wrapAround': true
    })
</script>
@endsection
@endsection