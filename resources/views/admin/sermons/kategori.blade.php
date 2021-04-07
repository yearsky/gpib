@extends('admin.layout.template')
@section('title','All Kategori')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Seluruh Kategori Sermons</h3>
          <button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#modal-default">
            Tambah Kategori
          </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table  table-striped">
            <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($kategori as $kt)
              <tr>
                <td>{{$loop->iteration}}</td>
              <td><a href="#" class="nkat" data-type="text" data-pk="{{$kt->id_kategori}}" data-url="/sermons/kategori/{{$kt->id_kategori}}/editkategori" data-title="Masukan Nama Baru">{{$kt->nama}}</a></td>
                <td>
                 <button class="btn btn-sm btn-danger" onclick="deleteData({{$kt->id_kategori}})">Delete</button>
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
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/sermons/kategori" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori</label>
                <input type="text" name="nkategori" class="nama form-control" id="exampleInputEmail1" placeholder="Cth: Love">
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
        <script src="{{asset('admin/dist/js/bootstrap-editable.js')}}"></script>
        <script src="{{asset('admin/dist/js/bootstrap-editable.min.js')}}"></script>
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
                            url : "{{ url('/sermons/kategori/destroy')}}" + '/' + id,
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

            $(document).ready(function() {
                  $('.nkat').editable({
                    mode: 'inline',
                  });
              });

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
