<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Top Header Meta -->
                        <div class="top-header-meta d-flex flex-wrap">
                            <a href="#" class="open" data-toggle="tooltip" data-placement="bottom" title="10 Am to 6 PM"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Opening Hours - 10 Am to 6 PM</span></a>
                            <!-- Social Info -->
                            <div class="top-social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Top Header Meta -->
                        <div class="top-header-meta">
                            <a href="mailto:{{$website->email}}" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span>{{$website->email}}</span></a>
                            <a href="#" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>{{$website->nohp}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Header Area ***** -->

    <!-- ***** Navbar Area ***** -->
    <div class="crose-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="croseNav">

                    <!-- Nav brand -->
                    {{-- <a href="{{url('/home')}}" class="nav-brand"><img src="" alt="Logo"></a> --}}
                    <nav class="navbar navbar-light">
                        {{-- <span class="navbar-brand mb-0 h1">{{$website->nama}}</span> --}}
                        <a class="navbar-brand" href="#">
                          <img src="{{$website->getImage()}}" width="150" height="150" class="d-inline-block align-top" alt="Logo">
                        </a>
                      </nav>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                @foreach($menupengunjung as $menus)
                                @if(count($menus->submenupengunjung)!=0)
                                    <li><a href="{{url('/'.$menus->link)}}">{{$menus->judul}}</a>
                                        <ul class="dropdown">
                                            @foreach($menus->submenupengunjung as $sm)
                                            <li><a href="{{$sm->link}}">{{$sm->judul}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                <li><a href="{{url('/'.$menus->link)}}">{{$menus->judul}}</a></li>
                                @endif
                                @endforeach
                            </ul>

                            <!-- Search Button -->
                            <div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

                            <!-- Donate Button -->
                            {{-- <a href="#" class="btn crose-btn header-btn">Donate Us</a> --}}

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>

        <!-- ***** Search Form Area ***** -->
        <div class="search-form-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="searchForm">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
                                <button type="submit" class="d-none"></button>
                            </form>
                            <div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Navbar Area ***** -->
</header>