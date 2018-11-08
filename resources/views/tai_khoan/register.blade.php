<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
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
  	<style type="text/css">
  		span {
  			color: #FF0054;
  		}
  	</style>
</head>
<body class="hold-transition login-page" style="background-color: #C9F7FF">
	<div class="login-box">
		<div class="login-logo">
		    <h1>Đăng ký</h1>
		</div><!-- /.login-logo -->

		<div class="card">
		    <div class="card-body login-card-body">
				<p>Giáo vụ đã có tài khoản?  <a href="{{route('login')}}" >Đăng nhập</a></p>

				<!-- thông báo lỗi đăng ký -->
				@if(session('error_register'))
				<div class="alert alert-danger alert-dismissible fade show">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    {{session('error_register')}}
				</div>
				@endif

				<!-- form -->
				<form action="{{route('register')}}" class="form-horizontal" method="post" id="register_form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
		            	<label class="control-label col-sm-12">Họ và tên:</label>
		                <div class="col-sm-12">
		                	<input type="text" class="form-control" name="txtHoTen" id="txtHoTen">
		                	<span id="hoTenErr"></span>
		                </div> 
		            </div>
		            <div class="form-group">
		            	<label class="control-label col-sm-12">Tài khoản:</label>
		                <div class="col-sm-12">
		                	<input type="text" class="form-control" name="txtTaiKhoan" id="txtTaiKhoan">
		                	<span id="taiKhoanErr"></span>
		                </div> 
		            </div>
		            <div class="form-group">
		            	<label class="control-label col-sm-12">Mật khẩu:</label>
		                <div class="col-sm-12">
		                	<input type="password" class="form-control" name="txtMatKhau" id="txtMatKhau">
		                	<span id="matKhauErr"></span>
		                </div> 
		            </div>
		            <div class="form-group">
		            	<div class="row">
		            		<div class="col-md-3"></div>
		            		<div class="col-md-8">
		            			<input type="submit" class="btn btn-outline-primary" value="Đăng ký">
		            			<input type="reset" class="btn btn-outline-warning" value="Nhập lại">
		            		</div>
		            	</div>
		            </div>  
		        </form>
			</div> <!-- /.card-body -->
		</div> <!--/.card-->     
	</div> <!-- /.login-box -->

	<!-- jQuery -->
	<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- Validation -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#register_form').submit(function(){
				var hoTen = $.trim($('#txtHoTen').val());
				var taiKhoan = $.trim($('#txtTaiKhoan').val());
				var matKhau = $.trim($('#txtMatKhau').val());
				var flag = true;

				if(hoTen == '')
				{
					$('#hoTenErr').text('Họ tên không được để trống');
					flag = false;
				}
				else if(hoTen.length > 200)
				{
					$('#hoTenErr').text('Tên quá dài, vui lòng nhập lại');
					flag = false;
				}
				else 
				{
					$('#hoTenErr').text('');
				}

				if(taiKhoan == '')
				{
					$('#taiKhoanErr').text('Tài khoản không được để trống');
					flag = false;
				}
				else if(taiKhoan.length > 100)
				{
					$('#taiKhoanErr').text('Tên tài khoản quá dài, vui lòng nhập lại');
					flag = false;
				}
				else 
				{
					$('#taiKhoanErr').text('');
				}

				if(matKhau == '')
				{
					$('#matKhauErr').text('Mật khẩu không được để trống');
					flag = false;
				}
				else if(matKhau.length > 50)
				{
					$('#matKhauErr').text('Mật khẩu quá dài, vui lòng nhập lại');
					flag = false;
				}
				else 
				{
					$('#matKhauErr').text('');
				}
				return flag;
			});
		});
	</script>
</body>
</html>