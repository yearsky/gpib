@extends('admin.layout.template')
@section('title','All data Slide')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Seluruh Warta</h3>
            <button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Warta
            </button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Title</th>
                  <th>File</th>
                  <th>Created At</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($warta as $wr)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$wr->title}}</td>
                    {{-- <a class="word" href="//docs.google.com/gview?url=http://www.picssel.com/demos/downloads/Fancybox.doc&embedded=true"></a> --}}
                    <td>{{$wr->file}}</td>
                    <td>{{$wr->created_at}}</td>
                    <td>
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">
                              Aksi
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="/warta/{{$wr->title}}/edit">Edit</a>
                              <a class="dropdown-item" href="#" onclick="deleteData({{$wr->id}})">Delete</a>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/warta/addnew" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title" class="nama form-control" id="exampleInputEmail1" placeholder="Cth: Warta Hari Minggu ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">File</label>
                <input type="file" name="ffile" class="form-control" style="padding-bottom: 2.5rem!important;padding-top: 5.rem!important">
                <span class="mt-3 badge badge-info">Format yang didukung: pdf,docx,doc</span>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
          </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
        @section('scripts')
        <script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <script src="{{asset('admin/dist/js/jquery-fancybox.min.js')}}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function deleteData(id){
                swal({
                    title: "Yakin Mau di Hapus?",
                    text: "Setelah hapus, Anda tidak akan menemukan data ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "{{ url('/warta/destroy')}}" + '/' + id,
                            type : "POST",
                            data : {'_method' : 'DELETE', _token: '{{csrf_token()}}'},
                            success: function(data){
                                swal("Yey! Data anda telah di Hapus", {
                                icon: "success",
                                }).then(function() {
                                location.reload();
                              });
                            },
                            error : function(data){
                              var errors = data.responseJSON;
                               console.log(errors);
                            }
                        })
                    } else {
                    swal("Data kamu tetap aman ! :)");
                    }
                });
            }

            $(document).ready(function() {
                  $(".word").fancybox({
                    'width': 600, // or whatever
                    'height': 320,
                    'type': 'iframe'
                  });
                  }); //  re

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
