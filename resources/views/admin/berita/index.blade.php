@extends('admin.layout.template')
@section('title','All data Berita')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Seluruh Berita</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table  table-striped">
            <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Author</th>
              <th>Image</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($berita as $br)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$br->judul}}
                </td>
                <td>{!!limit($br->deskripsi)!!}</td>
                <td>{{$br->author}}</td>
                <td><img class="img-fluid"
                  src="{{$br->getImage()}}"
                   alt="User profile picture"></td>
                <td>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/berita/{{$br->judul}}/edit">Edit</a>
                      <a class="dropdown-item" href="#" onclick="deleteData({{$br->id_berita}})">Delete</a>
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
        @section('scripts')
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
                            url : "{{ url('/berita/destroy')}}" + '/' + id,
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
