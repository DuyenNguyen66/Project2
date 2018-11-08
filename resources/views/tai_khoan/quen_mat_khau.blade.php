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
		    <h1>Quên mật khẩu</h1>
		</div><!-- /.login-logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <p>Giáo vụ đã có tài khoản?  <a href="{{route('login')}}" >Đăng nhập</a></p>
                <!-- form -->
                <form action="" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- tên viết tắt -->
                    <div class="form-group">
                        <label class="control-label col-sm-12">Nhập họ và tên giáo vụ:</label>
                        <div class="row">
                            <input type="text" class="form-control col-sm-10" name="txtHoTen" id="txtHoTen">
                            <input type="submit" id="btnGui" class="btn btn-outline-primary col-sm-2" value="Gửi"> 
                        </div> 
                    </div>
                </form>
                <div id="div_pass" style="display: none;"></div>
            </div><!-- /.card-body -->
        </div> <!--/.card-->         
    </div><!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btnGui').click(function(){
                var hoTen = $.trim($('#txtHoTen').val());
                if(hoTen == '')
                {
                    alert('Hãy nhập tên giáo vụ.');
                    return false;
                }
                else
                {
                    $.get("{{route('quenMatKhauXuLy')}}",{hoTen:hoTen},function(data){
                        $('#div_pass').html(data);
                        $('#div_pass').show();
                    });
                }
            });
        });
    </script>
</body>
</html>