@extends('admin.layout.template')
@section('title','Pengaturan Website')

@section('content')

<div class="wrapper">
 
  <!-- Content Wrapper. Contains page content -->
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="card mx-5 card-primary card-outline">
            <!-- Main content -->
            <div class="card-body">
              <h4>Pengaturan Website</h4>
              <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><i class="nav-icon fas fa-home"></i>&nbsp;Tentang Website</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"><i class="nav-icon fas fa-address-book"></i>&nbsp;Kontak</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false"><i class="nav-icon fas fa-atom"></i>&nbsp;Logo/Icon</a>
                </li>
              </ul>
              <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                 <div class="col-md-12">
                  <form role="form" method="POST" action="{{url('website/'.$website->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Website</label>
                          <input type="text" name="nama" class="nama form-control" id="exampleInputEmail1" value="{{$website->nama}}">
                          <span style="color: #FFF22"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$website->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value="{{$website->alamat}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jam Kerja</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="jam" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$website->hari_kerja}}</textarea>
                            </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                     
                        <button type="submit" class="btn btn-primary float-right">Simpan Pengaturan</button>
                     
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                  <form role="form" method="POST" action="{{url('website/'.$website->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="jam" value="{{$website->hari_kerja}}">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="text" name="email" class="nama form-control" id="exampleInputEmail1" value="{{$website->email}}">
                          <span style="color: #FFF22"></span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">No Telepon</label>
                          <input type="text" name="nohp" class="nama form-control" id="exampleInputEmail1" value="{{$website->nohp}}">
                          <span style="color: #FFF22"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">WhatsApp</label>
                            <input type="text" name="wa" class="form-control" id="exampleInputEmail1" value="{{$website->wa}}">
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                     
                        <button type="submit" class="btn btn-primary float-right">Simpan Pengaturan</button>
                     
                    </form>
                </div>
                <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                  <form role="form" method="POST" action="{{url('website/'.$website->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="jam" value="{{$website->hari_kerja}}">
                  <div class="form-group">
                    <label for="exampleInputFile">Logo/Image</label>
                    <div class="input-group">
                      
                        <div class="col-lg-10 mx-5">
                          <input type="file" name="image" class="file-input-custom">
                      </div>
                      
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-right">Simpan Pengaturan</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.content -->
          </div>
         
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



@endsection
@section('scripts')
        {{-- <script src="{{asset('admin/dist/js/form-layout.js')}}"></script> --}}
        <script src="{{asset('admin/dist/js/file-input.js')}}"></script>
        <script>
        $('.file-input-custom').fileinput({
        previewFileType: 'image',
        browseLabel: 'Select',
        browseClass: 'btn bg-slate-700',
        browseIcon: '<i class="far fa-image position-left"></i> ',
        removeLabel: 'Remove',
        removeClass: 'btn btn-danger',
        removeIcon: '<i class="fas fa-times-circle position-left"></i> ',
        uploadClass: 'd-none',
        uploadIcon: '<i class="icon-file-upload position-left"></i> ',
        layoutTemplates: {
            caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="far fa-file kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
        },
            initialPreview: ["<img src='{{$website->getImage()}}' class='file-preview-image' alt=''>",],
            overwriteInitial: true
        });
        </script>
        @endsection