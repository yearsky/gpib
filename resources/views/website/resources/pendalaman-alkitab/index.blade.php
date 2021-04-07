@extends('website.layout.template')
@section('title','Pendalaman Alkitab')
@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/Resources')}}">Resources</a></li>
                        <li class="breadcrumb-item"><a href="#">Pendalaman-Alkitab</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="about-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading">
                    <h2>Pendalaman Alkitab</h2>
                    <p>Mendalami Firman bukan untuk sekedar memenuhi pengetahuan, namun belajar untuk melakukan kebenaran yang dipahami dalam kehidupan sehari-hari</p>
                </div>
            </div>
        </div>
       <div class="row">
                <div class="col-md-8 mb-5">
                    <div style="max-height: 400px; overflow: hidden">
                        <img src="{{asset('assets/img/bg-img/4.jpg')}}" alt="Picture" style="max-width: 100%">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div style="padding: 30px; background-color: #f6f6f6">
                        <div style="font-size: 28px; margin-bottom: 10px; color: #646464">NIKODEMUS</div>
                        <div style="font-size: 16px; margin-bottom: 27px; color: #7f7f7f; line-height: 30px">Nikodemus adalah seorang pemimpin agama Yahudi yang masuk dalam golongan Farisi. Ia memiliki kecerdasan, status dan kedudukan sosial yang tinggi dan sangat bermoral.... <span style="font-size:12px; font-weight:bold">more</span></div>

                        <div><a href="/Resources/bahan-katekisasi" style="color: #ffa810; font-size:18px;">Read More <i class="fa fa-angle-double-right"></i></a></div>
                    </div>
                </div>
        </div>
    </div>
</section>

@endsection