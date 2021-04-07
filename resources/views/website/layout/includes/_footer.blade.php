<footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70">
                        <a href="#" class="footer-logo"><img src="" alt=""></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70">
                        <h5 class="widget-title">Kunjungi Juga</h5>
                        <nav class="footer-menu">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Home</a></li>
                                <li><a href="{{url('/event')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Event</a></li>
                                <li><a href="{{url('/Gallery')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Gallery</a></li>
                                <li><a href="{{url('/home')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sermons</a></li>
                                <li><a href="{{url('/home')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contact</a></li>
                                <li><a href="{{url('/home')}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blogs</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70">
                        <h5 class="widget-title">Warta Latest</h5>

                        <!-- Single Latest News -->
                        @foreach($warta as $wr)
                        <div class="single-latest-news">
                            <a href="#">{{$wr->title}}</a>
                            {{-- <p><i class="fa fa-calendar" aria-hidden="true"></i> November 11, 2017</p> --}}
                        </div>
                        @endforeach
                       
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-70">
                        <h5 class="widget-title">Contact Us</h5>

                        <div class="contact-information">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$website->alamat}}</p>
                            <a href="callto:{{$website->nohp}}"><i class="fa fa-phone" aria-hidden="true"></i>{{$website->nohp}}</a>
                            <a href="mailto:{{$website->email}}"><i class="fa fa-envelope" aria-hidden="true"></i> {{$website->email}}</a>
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i>Senin-Jumat : 10.00-16.00</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Copwrite Area -->
    <div class="copywrite-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center flex-wrap">
                <!-- Copywrite Text -->
               

                <!-- Footer Social Icon -->
                <div class="col-12 col-md-6">
                    <div class="footer-social-icon">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>