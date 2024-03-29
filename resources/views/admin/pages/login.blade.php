<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <title>Đăng Nhập</title>

    <!-- Custom fonts for this template-->
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập hệ thống</h1>
                                    </div>
                                    <form class="user" action="{{route('login.admin')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Nhập địa chỉ email">
                                        </div>
                                        @if($errors->has('email'))           
                                            <span style="color: red; margin-left: 15px">
                                                {{$errors->first('email')}}
                                            </span>
                                        @endif
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Nhập mật khẩu">
                                        </div>
                                        @if($errors->has('password'))           
                                            <span style="color: red; margin-left: 15px">
                                                {{$errors->first('password')}}
                                            </span>
                                        @endif
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ghi nhớ đăng nhập</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Đăng nhập" class="btn btn-primary btn-user btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/admin/js/sb-admin-2.min.js"></script>
</body>

@if(session('thongbao'))
    <script type="text/javascript">
        toastr.success('{{session('thongbao')}}', 'Đăng nhập thành công ', {timeOut: 5000});
    </script>
@endif

@if(session('loi'))
    <script type="text/javascript">
        toastr.success('{{session('error')}}', 'Đăng nhập thất bại ', {timeOut: 5000});
    </script>
@endif

</html>
