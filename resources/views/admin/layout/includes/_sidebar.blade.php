<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="" alt="Web Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
  <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  
                </p>
          </a>
        </li>
        <li class="nav-header">Menu Utama</li>
       
            <li class="nav-item has-treeview {{(Request::segment(1) == 'sermons') ? 'menu-open' : ''}}">
              <a href="#" class="nav-link  {{(Request::segment(1) == 'sermons') ? 'active' : ''}}">
                <i class="fas fa-praying-hands nav-icon"></i>
                <p>
                 Sermons
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('sermons/all')}}" class="nav-link {{(Request::path() == 'sermons/all') ? 'active' : ''}}">
                    <i class="fas fa-server nav-icon"></i>
                    <p>All Data</p>
                  </a>
                  <a href="{{url('sermons/addnew')}}" class="nav-link {{(Request::path() == 'sermons/addnew') ? 'active' : ''}}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add New</p>
                  </a>
                  <a href="{{url('sermons/kategori')}}" class="nav-link {{(Request::path() == 'sermons/addkategori') ? 'active' : ''}}">
                    <i class="fas fa-asterisk nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{(Request::segment(1) == 'warta') ? 'menu-open' : ''}}">
              <a href="#" class="nav-link  {{(Request::segment(1) == 'warta') ? 'active' : ''}}">
                <i class="fas fa-book-open nav-icon"></i>
                <p>
                 Warta
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('warta/all')}}" class="nav-link {{(Request::path() == 'warta/all') ? 'active' : ''}}">
                    <i class="fas fa-server nav-icon"></i>
                    <p>All Data</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{(Request::segment(1) == 'resources') ? 'menu-open' : ''}}">
              <a href="#" class="nav-link  {{(Request::segment(1) == 'resources') ? 'active' : ''}}">
                <i class="fas fa-archive nav-icon"></i>
                <p>
                 Resources
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('resources/pendalaman-alkitab')}}" class="nav-link {{(Request::path() == 'resources/pendalaman-alkitab') ? 'active' : ''}}">
                    <i class="fas fa-bible nav-icon"></i>
                    <p>Pendalaman Alkitab</p>
                  </a>
                  <a href="{{url('resources/bahan-katekisasi')}}" class="nav-link {{(Request::path() == 'resources/bahan-katekisasi') ? 'active' : ''}}">
                    <i class="fas fa-book nav-icon"></i>
                    <p>Bahan Katekisasi</p>
                  </a>
                </li>
              </ul>
            </li>


        <li class="nav-header">Layout Website</li>
        <li class="nav-item has-treeview {{(Request::segment(1) == 'slider') ? 'menu-open' : ''}}">
          <a href="#" class="nav-link  {{(Request::segment(1) == 'slider') ? 'active' : ''}}">
            <i class="nav-icon fas fa-stream"></i>
            <p>
              Slider
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item" class="">
              <a href="{{url('slider/all')}}" class="nav-link {{(Request::path() == 'slider/all') ? 'active' : ''}}">
                <i class="fas fa-server nav-icon"></i>
                <p>All Data</p>
              </a>
            </li>
            <li class="nav-item" class="">
              <a href="{{url('slider/addnew')}}" class="nav-link {{(Request::path() == 'slider/addnew') ? 'active' : ''}}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{(Request::segment(1) == 'events') ? 'menu-open' : ''}}">
          <a href="#" class="nav-link  {{(Request::segment(1) == 'events') ? 'active' : ''}}">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Events
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item" class="">
              <a href="{{url('events/all')}}" class="nav-link {{(Request::path() == 'events/all') ? 'active' : ''}}">
                <i class="fas fa-server nav-icon"></i>
                <p>All Data</p>
              </a>
            </li>
            <li class="nav-item" class="">
              <a href="{{url('events/addnew')}}" class="nav-link {{(Request::path() == 'events/addnew') ? 'active' : ''}}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{(Request::segment(1) == 'berita') ? 'menu-open' : ''}}">
          <a href="#" class="nav-link  {{(Request::segment(1) == 'berita') ? 'active' : ''}}">
            <i class="nav-icon far fa-newspaper"></i>
            <p>
              Berita
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item" class="">
              <a href="{{url('berita/all')}}" class="nav-link {{(Request::path() == 'berita/all') ? 'active' : ''}}">
                <i class="fas fa-server nav-icon"></i>
                <p>All Data</p>
              </a>
            </li>
            <li class="nav-item" class="">
              <a href="{{url('berita/addnew')}}" class="nav-link {{(Request::path() == 'berita/addnew') ? 'active' : ''}}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{(Request::segment(1) == 'gallery') ? 'menu-open' : ''}}">
          <a href="#" class="nav-link  {{(Request::segment(1) == 'gallery') ? 'active' : ''}}">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gallery
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item" class="">
              <a href="{{url('gallery/all')}}" class="nav-link {{(Request::path() == 'gallery/all') ? 'active' : ''}}">
                <i class="fas fa-server nav-icon"></i>
                <p>All Data</p>
              </a>
            </li>
            <li class="nav-item" class="">
              <a href="{{url('gallery/addnew')}}" class="nav-link {{(Request::path() == 'gallery/addnew') ? 'active' : ''}}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>

        
       

        <li class="nav-header">PENGATURAN</li>
        {{-- <li class="nav-item">
          <a href="/akun/administrator" class="nav-link {{ Request::segment(1) === 'akun' ? 'active' : null }}">
              <i class="nav-icon far fa-id-badge"></i>
              <p>
                Akun Administrator
              </p>
            </a>
          </li> --}}
        <li class="nav-item">
        <a href="/website" class="nav-link {{ Request::segment(1) === 'website' ? 'active' : null }}">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              Website
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>