<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="../../../plugins/ionslider/ion.rangeSlider.css">
  <!-- ion slider Nice -->
  <link rel="stylesheet" href="../../../plugins/ionslider/ion.rangeSlider.skinNice.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="../../../plugins/bootstrap-slider/slider.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<title>@yield('title')</title>
</head>
<body>
	@include('layouts.header')
	@include('layouts.sidebar')
	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1>Data Tables</h1>
	                </div>
	            </div>
	        </div><!-- /.container-fluid -->
	    </section>

	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-12">
	          		<div class="card">
	            		<div class="card-header">
	              			<h3 class="card-title">Data Table With Full Features</h3>
            			</div>
			            <!-- /.card-header -->
			            <div class="card-body">
			              <table id="example2" class="table table-bordered table-striped">
			                <thead>
			                <tr>
			                  <th>Rendering engine</th>
			                  <th>Browser</th>
			                  <th>Platform(s)</th>
			                  <th>Engine version</th>
			                  <th>CSS grade</th>
			                </tr>
			                </thead>
			                <tbody>
			                <tr>
			                  <td>Presto</td>
			                  <td>Opera 7.5</td>
			                  <td>Win 95+ / OSX.2+</td>
			                  <td>-</td>
			                  <td>A</td>
			                </tr>
			                <tr>
			                  <td>Misc</td>
			                  <td>NetFront 3.1</td>
			                  <td>Embedded devices</td>
			                  <td>-</td>
			                  <td>C</td>
			                </tr>
			                
			                </tbody>
			                <tfoot>
			                <tr>
			                  <th>Rendering engine</th>
			                  <th>Browser</th>
			                  <th>Platform(s)</th>
			                  <th>Engine version</th>
			                  <th>CSS grade</th>
			                </tr>
			                </tfoot>
			              </table>
			            </div>
			            <!-- /.card-body -->
	            	</div>
	          		<!-- /.card -->
	        	</div>
	        	<!-- /.col -->
	      	</div>
	      	<!-- /.row -->
	    </section>
	    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
	@include('layouts.footer')
</div>

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- Ion Slider -->
<script src="../../../plugins/ionslider/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="../../../plugins/bootstrap-slider/bootstrap-slider.js"></script>

<script>
	//Select box
	$(document).ready(function(){			
	    $("#sltLopHoc").change(function(){
	        $("#form_select").submit();
	    });
	});
	$(document).ready(function(){
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false
	    });
    });
</script>
	
</body>
</html>