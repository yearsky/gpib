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
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th style="width: 40px">Aksi</th>
                </tr>
              </thead>
              <tbody>
               @if(count($slider)>0)   
                @foreach ($slider as $sd)  
                <tr>
                  <td>{{$loop -> iteration}}</td>
                  <td>{{$sd->nama}}</td>
                  <td>{!!limit($sd->deskripsi)!!}</td>
                  <td><img class="img-fluid"
                    src="{{$sd->getImage()}}"
                     alt="User profile picture"></td>
                  <td>{{$sd->link}}</td>
                  <td><input type="checkbox" data-id="{{ $sd->id_slider }}" name="status" class="js-switch" {{ $sd->status == 1 ? 'checked' : '' }}></td>
                  {{-- <td><input data-id="{{$sd->id_slider}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sd->status == 1 ? 'checked' : '' }}>
                  </td> --}}
                  <td>
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-danger btn-sm  dropdown-toggle" data-toggle="dropdown">
                        Aksi
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="/slider/{{$sd->nama}}/edit">Edit</a>
                        <a class="dropdown-item" href="#" onclick="deleteData({{$sd->id_slider}})">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td><td><td><td>&emsp;Data Kosong!</td><td><td><td></td></td></td></td></td></td>
                  </tr>
                 @endif
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

                  
        
          $('.js-switch').change(function(){
            var status = $(this).prop('checked') === true ? 1 : 0;
            var id_slider = $(this).data('id');

            $.ajax({
                type: "POST",
                url: '/slider/changestatus',
                data: {'status': status, 'id_slider': id_slider},
                success: function(data){
                  toastr.success('Status Berhasil Diganti')
                  }
            });
          });
          let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

          elems.forEach(function(html) {
          let switchery = new Switchery(html,  { size: 'small' });
          });
        </script>
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
                            url : "{{ url('/slider/destroy')}}" + '/' + id,
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
