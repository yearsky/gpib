@extends('website.layout.template')
@section('title','GPIB Benowo')
@section('content')
    
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area hero-post-slides owl-carousel">
        @foreach($slider as $key => $result)
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" alt="{{$result->name}}" style="background-image: url({{asset('images/slider/'.$result->image)}});">
            <!-- Post Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">{{$result->nama}}</h2>
                            <p data-animation="fadeInUp" data-delay="300ms">{!!$result->deskripsi!!}</p>
                            <a href="{{$result->link}}" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Welcome To Church</h2>
                        <p>A church isn't a building—it's the people. We meet in locations around the United States and globally at Life.Church Online. No matter where you join us.</p>
                    </div>
                </div>
            </div>

            <div class="row about-content justify-content-center">
                <!-- Single About Us Content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-content mb-100">
                        <img src="{{asset('images/Warta.png')}}" alt="">
                        <div class="about-text">
                            <h4>Our Church</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            <a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single About Us Content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-content mb-100">
                        <img src="{{asset('assets/img/bg-img/4.jpg')}}" alt="">
                        <div class="about-text">
                            <h4>Our History</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            <a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single About Us Content -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-us-content mb-100">
                        <img src="{{asset('assets/img/bg-img/5.jpg')}}" alt="">
                        <div class="about-text">
                            <h4>Our Sermons</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            <a href="#">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url({{asset('assets/img/bg-img/6.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-content text-center">
                        <h6>A Place For You</h6>
                        <h2>Find a place to connect and grow through a small group, class, or regular gathering.</h2>
                        <a href="#" class="btn crose-btn btn-2">Become A Member</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### Latest Sermons Area Start ##### -->
    <section class="latest-sermons-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Khotbah Terbaru</h2>
                        <p>Menguatkan kita dalam segala percobaan dalam hidup.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Latest Sermons -->
                @foreach($sermons as $se)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-latest-sermons mb-100">
                        <div class="sermons-thumbnail">
                            <img src="{{asset('images/sermons/'.$se->image)}}" alt="{{$se->judul}}">
                            <!-- Date -->
                            <div class="sermons-date">
                            <h6><span>{{$se->getTgl()}}</span>{{$se->getBt()}}</h6>
                            </div>
                        </div>
                        <div class="sermons-content">
                            {{-- <div class="sermons-cata">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Video"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Audio"><i class="fa fa-headphones" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
                            </div> --}}
                            <h4><a href="{{url('/sermons-detail/'.$se->judul)}}">{!!limit($se->deskripsi)!!}</a></h4>
                            <div class="sermons-meta-data">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Khotbah dari: <span>{{$se->from_sermons}}</span></p>
                                <p><i class="fa fa-tag" aria-hidden="true"></i> Kategori: <span>{{$se->kategori}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Latest Sermons Area End ##### -->

    <!-- ##### Upcoming Events Area Start ##### -->
    <section class="upcoming-events-area section-padding-0-100">
        <!-- Upcoming Events Heading Area -->
        <div class="upcoming-events-heading bg-img bg-overlay bg-fixed" style="background-image: url({{asset('assets/img/bg-img/1.jpg')}});">
            <div class="container">
                <div class="row">
                    <!-- Section Heading -->
                    <div class="col-12">
                        <div class="section-heading text-left white">
                            <h2>Upcoming Events</h2>
                            <p>Jangan sampai ketinggalan event nya yaaa!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events Slide -->
        <div class="upcoming-events-slides-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="upcoming-slides owl-carousel">

                            <div class="single-slide">
                                <!-- Single Upcoming Events Area -->
                                @foreach($events as $ev)
                                <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                    <!-- Thumbnail -->
                                    <div class="upcoming-events-thumbnail">
                                        <img src="{{$ev->getImage()}}" alt="Picture">
                                    </div>
                                    <!-- Content -->
                                    <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                        <div class="events-text">
                                            <h4>{{$ev->judul}}</h4>
                                            <div class="events-meta">
                                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{$ev->testDate()}}</a>
                                                <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$ev->waktu}}</a>
                                                <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$ev->lokasi}}</a>
                                            </div>
                                            <p>{!!$ev->deskripsi!!}</p>
                                            <a href="{{url('/events/'.$ev->judul)}}">Read More <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                        <div class="find-out-more-btn">
                                            <a href="#" class="btn crose-btn btn-2">Find Out More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Single Upcoming Events Area -->
                                
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Upcoming Events Area End ##### -->

    <!-- ##### Gallery Area Start ##### -->
    <div class="gallery-area d-flex flex-wrap">
        <!-- Single Gallery Area -->
        <div class="single-gallery-area">
            <a href="" class="gallery-img" title="Gallery Image 1">
                <img src="" alt="">
            </a>
        </div>

       

        <!-- Single Gallery Area -->
     
    </div>
    <!-- ##### Gallery Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Latest News</h2>
                        <p>Latest information on religion, church, politics revolves around us</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Blog Post Area -->
                @foreach($berita as $br)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail">
                            <a href="{{url('/Blog-details/'.$br->id_berita)}}"><img src="{{$br->getImage()}}" alt="Picture"></a>
                        </div>
                        <div class="post-content">
                            <a href="{{url('/Blog-details/'.$br->id_berita)}}" class="post-title">
                                <h4>{{$br->judul}}</h4>
                            </a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{$br->author}}</a>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{$br->date()}}</a>
                            </div>
                            <p class="post-excerpt">{!!limit($br->deskripsi)!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Subscribe Text -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-text">
                        <h3>Subscribe To Our Newsletter</h3>
                        <h6>Subcribe Us And Tell Us About Your Story</h6>
                    </div>
                </div>
                <!-- Subscribe Form -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form text-right">
                        <form action="#">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Your Email">
                            <button type="submit" class="btn crose-btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->
 @endsection