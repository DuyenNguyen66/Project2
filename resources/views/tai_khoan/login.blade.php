<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<!-- Tell the browser to be responsive to screen width -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  	<!-- iCheck -->
  	<link rel="stylesheet" href="{{asset('AdminLTE/plugins/iCheck/square/blue.css')}}">
  	<!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-color: #C9F7FF">
	<div class="login-box">
		<div class="login-logo">
		    <h1>Đăng nhập</h1>
		</div>
		<!-- /.login-logo -->
		<div class="card">
		    <div class="card-body login-card-body">
		        <p>Giáo vụ chưa có tài khoản?  <a href="{{route('register')}}" >Đăng ký</a></p>

		        <!-- đăng ký -->
		        @if(session('success_register'))
		        <div class="alert alert-success alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    {{session('success_register')}}
				</div>
				<!-- đăng nhập -->	
				@elseif(session('Error'))			
				<div class="alert alert-danger alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    {{session('Error')}}
				</div>
				<!-- đăng xuất -->
				@elseif(session('SuccessLogout'))
				<div class="alert alert-success alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    {{session('SuccessLogout')}}
				</div>
				@endif

				<!-- form đăng nhập -->
				<form action="{{route('login')}}" class="form-horizontal" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
		            <div class="form-group">
		            	<label class="control-label col-sm-12">Tài khoản:</label>
		                <div class="col-sm-12">
		                	<input type="text" class="form-control" name="txtTaiKhoan">
		                </div> 
		            </div>
		            <div class="form-group">
		            	<label class="control-label col-sm-12">Mật khẩu:</label>
		                <div class="col-sm-12">
		                	<input type="password" class="form-control" name="txtMatKhau">
		                </div> 
		            </div>
		            <div class="form-group">
		            	<div class="row">
		            		<div class="col-md-4"></div>
		            		<div class="col-md-8">
		            			<input type="submit" class="btn btn-outline-primary" value="Đăng nhập">
		            			<br><a href="{{route('quenMatKhau')}}">Quên mật khẩu?</a>
		            		</div>
		            	</div>
		            </div>  
		        </form>
			</div><!-- /.card-body -->
		</div> <!--/.card-->     
	</div><!-- /.login-box -->

	<!-- jQuery -->
	<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	
</body>
</html>