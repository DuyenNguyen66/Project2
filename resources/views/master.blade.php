<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- Bootstrap-Slider -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/bootstrap-slider/slider.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<title>@yield('title')</title>
	<style type="text/css">
		span {
			color: #FF0054;
		}
		#hienThi {
			margin-top: 50px;
		}
	</style>
</head>
<body>
	@include('layouts.header')
	@include('layouts.sidebar')
	<!-- Content Wrapper -->
  	<div class="content-wrapper">
	    <!-- Page header -->
	    <section class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    
	                </div>
	            </div>
	        </div><!-- /.container-fluid -->
	    </section>

	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-12">
	          		@yield('content')
	        	</div><!-- /.col -->
	      	</div><!-- /.row -->
	    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
	@include('layouts.footer')
</div>

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- Bootstrap slider -->
<script src="{{asset('AdminLTE/plugins/bootstrap-slider/bootstrap-slider.js')}}"></script>

@stack('js')
@stack('hover')
@stack('alert')
@stack('validate')
<script>
	$(document).ready(function(){	
		$('#example2').DataTable();
	});
</script>
</body>
</html>