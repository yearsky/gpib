@extends('website.layout.template')
@section('title','GPIB Benowo')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Request::segment(1)}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="map-area mt-30">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.0018105055633!2d112.62806511435089!3d-7.240630173125828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fe2fb7e78d03%3A0x479cea405032b74e!2sGpib%20Jemaat%20Benowo!5e0!3m2!1sen!2sid!4v1580481444694!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>

<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-content-area">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Kontak</h4>
                                <p>{{$website->email}}</p>
                                <p>{{$website->nohp}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Alamat</h4>
                                <p>{{$website->alamat}}</p>
                                <p>Indonesia, ID</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="contact-content contact-information">
                                <h4>Jam Kerja</h4>
                                <p>{!!$website->hari_kerja!!}</p>
                                <p>Ibadah Minggu: 09.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="contact-form section-padding-0-100">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Leave A Message</h2>
                    <p>Your email address will not be published. Required fields are marked.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="{{url('/contact')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-name">Full Name*:</label>
                                    <input type="text" name="nama" class="form-control" id="contact-name" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-email">Email*:</label>
                                    <input type="email" name="email" class="form-control" id="contact-email" placeholder="info.deercreative@gmail.com">
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="contact-number">Phone*:</label>
                                    <input type="text" name="nohp" class="form-control" id="contact-number" placeholder="(+12) 123 456 7910">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Message*:</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn crose-btn mt-15">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
     @if(Session::has('message'))
              var type = "{{ Session::get('alert-type', 'info') }}";
              switch(type){
                  case 'info':
                      toastr.info("{{ Session::get('message') }}");
                      break;
                  
                  case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;

                  case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;

                  case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
     @endif
</script>
@endsection
@endsection