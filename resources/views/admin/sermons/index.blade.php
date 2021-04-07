@extends('admin.layout.template')
@section('title','All Sermons')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Seluruh Sermons</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table  table-striped">
            <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Pembicara</th>
              <th>Kategori</th>
              <th>Image</th>
              <th>Video Url</th>
              <th>Audio Url</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(count($sermons)>0)
              @foreach($sermons as $s)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$s->judul}}</td>
                <td>{!! limit($s->deskripsi)  !!}</td>
                <td>{{$s->from_sermons}}</td>
                <td>{{$s->kategori}}</td>
                <td><img class="img-fluid"
                  src="{{$s->getImage()}}"
                  alt="User profile picture"></td>
                  <td>{{$s->video_url}}</td>
                  <td>{{$s->audio_url}}</td>
                <td>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">
                      Action
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/sermons/{{$s->id}}/edit">Edit</a>
                      <a class="dropdown-item" href="#" onclick="deleteData({{$s->id}})">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
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
                            url : "{{ url('/sermons/destroy')}}" + '/' + id,
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
