<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Backend Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
  {{-- Pace --}}
  <link rel="stylesheet" href="{{asset('admin/dist/css/pace.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  @include('sweet::alert')
<div class="login-box">
  <div class="login-logo">
    <b>BackEnd</b>Service
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>


      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<script>
  $(document).ready(function () {
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
  });
</script>
{{-- pace --}}
<script src="{{asset('admin/dist/js/pace.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</body>
</html>
