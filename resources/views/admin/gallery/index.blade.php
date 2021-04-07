@extends('admin.layout.template')
@section('title','All data Slide')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Seluruh Slide</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead class="thead-dark">                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($gallery as $gl)  
                <tr>
                  <td>{{$loop -> iteration}}</td>
                  <td>{{$gl->title}}</td>
                  <td><img class="img-fluid"
                    src="{{$gl->getImage()}}"
                     alt="User profile picture"></td>
                  
                  <td>
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">
                        Aksi
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/gallery/{{$gl->id}}/edit">Edit</a>
                        <a class="dropdown-item" href="#" onclick="deleteData({{$gl->id}})">Delete</a>
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
        @section('scripts')
        <script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function deleteData(id){
                swal({
                    title: "Yakin Mau di Hapus?",
                    text: "Setelah hapus, Anda tidak akan menemukan file ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "{{ url('/gallery/destroy')}}" + '/' + id,
                            type : "POST",
                            data : {'_method' : 'DELETE', _token: '{{csrf_token()}}'},
                            success: function(data){
                                swal("Yey! File anda telah di Hapus", {
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
                    swal("File kamu tetap aman ! :)");
                    }
                });
            }

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
