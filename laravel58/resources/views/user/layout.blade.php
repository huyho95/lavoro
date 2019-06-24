<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
        <title> User </title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->
        <!-- Custom styles for this template -->
        <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('theme_admin/css/abc.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Xin chào {{ get_data_user('web','name') }}</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#"></a></li>
                        <li><a href="{{ route('get.login') }}" title="Đăng xuất">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">

                        <li class="{{ \Request::route()->getName() == 'user.dashboard' ? 'active' : ''}}">
                            <a href="{{ route('user.dashboard') }}">Trang Tổng Quan</a>
                        </li>
                        <li class="{{ \Request::route()->getName() == 'user.update.info' ? 'active' : ''}}"><a href="{{ route('user.update.info') }}">Cập nhật thông tin</a></li>
                        <li class="{{ \Request::route()->getName() == 'user.update.password' ? 'active' : ''}}"><a href="{{ route('user.update.password') }}">Cập nhật mật khẩu</a></li>
                        <li class="{{ \Request::route()->getName() == 'user.list.product_care' ? 'active' : ''}}"><a href="{{ route('user.list.product_care') }}">Sản phẩm quan tâm</a></li>
                        <li class="{{ \Request::route()->getName() == 'user.list.product' ? 'active' : ''}}"><a href="{{ route('user.list.product') }}">Sản phẩm bán chạy</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thành công! </strong>{{ \Session::get('success') }}
                </div>
                @endif

                @if (\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Thất bại! </strong>{{ \Session::get('danger') }}
                </div>
                @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#out_img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#input_img").change(function() {
                readURL(this);
            });
        </script>
        @yield('script')
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    </body>
</html>
