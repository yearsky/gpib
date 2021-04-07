@extends('admin.layout.template')
@section('title','Add New')
@section('content')
<section class="content">
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit Data Slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{url('slider/'.$slider->id_slider)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Slider</label>
                            <input type="text" name="nama" value="{{$slider->nama}}" class="nama form-control" id="exampleInputEmail1" placeholder="Cth: GodBless">
                          <span style="color: #FFF22"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="deskripsi" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$slider->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                             <input type="text" name="link" value="{{$slider->link}}" class="form-control" id="exampleInputEmail1" placeholder="Cth: Berita/">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                              
                                <div class="col-lg-10">
                                  <input type="file" name="image" class="file-input-custom">
                              </div>
                            </div>
                          </div>
                        <div class="form-check">
                          <input type="checkbox" name="status" value="1" class="form-check-input" id="exampleCheck1" {{ $slider->status == 1 ? 'checked' : '' }}>
                          <label class="form-check-label" value="show" for="exampleCheck1">Status</label>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</section>
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
            initialPreview: ["<img src='{{$slider->getImage()}}' class='file-preview-image' alt=''>",],
            overwriteInitial: true
        });
        </script>
        @endsection