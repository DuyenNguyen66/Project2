@extends('master')
@section('title','Danh sách lớp học')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Danh sách lớp học</h1>
        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelThem">Thêm lớp học</a>
    </div><!-- /.card-header -->

    <div class="card-body">
        @if(session('err_add'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('err_add')}}
            </div>
        @endif
        <table id="example2" class="table table-bordered table-striped">  
			<thead>
				<tr>
					<th>Mã lớp học</th>
					<th>Tên viết tắt</th>
					<th>Tên lớp học</th>
					<th>Ngành học</th>
					<th>Sửa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($danhSachLop as $lopHoc)
				<tr>
					<td>{{$lopHoc->ma_lop_hoc}}</td>
					<td>{{$lopHoc->ten_viet_tat_lop}}</td>
					<td>{{$lopHoc->ten_lop_hoc}}</td>
					<td>{{$lopHoc->ten_nganh_hoc}}</td>
					<td><a href="{{route('suaLopHoc',['maLop' => $lopHoc->ma_lop_hoc,'maNganh' => $lopHoc->ma_nganh_hoc])}}" >
						<i class="fa fa-edit fa-2x"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> <!-- /.table-responsive -->
</div>
<!-- Modal thêm ngành học-->
<div class="modal fade" id="modelThem">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm lớp học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('themLopHoc')}}" class="form-horizontal" method="post" id="add_form">
			        <input type="hidden" name="_token" value="{{csrf_token()}}">
					<!-- chọn ngành -->
					<div class="form-group">
			        	<label class="control-label col-sm-12">Ngành học:</label>
			        	<div class="col-sm-12">
					      	<select class="form-control" name="sltNganhHoc" id="sltNganhHoc">
					      		<option value="0">--Chọn ngành--</option>
						        @foreach($danhSachNganh as $nganhHoc)
								<option value="{{$nganhHoc->ma_nganh_hoc}}">{{$nganhHoc->ten_nganh_hoc}}</option>
								@endforeach
					      	</select>
					      	<span id="sltNganhHocErr"></span>
				      	</div>
			        </div>
			        <!-- tên viết tắt -->
			        <div class="form-group">
			            <label class="control-label col-sm-12">Tên viết tắt:</label>
			            <div class="col-sm-12">
			                <input type="text" class="form-control" name="txtTenVietTat" id="txtTenVietTat">
			                <span id="tenVietTatErr"></span>
			            </div> 
			        </div>   
			        <!-- tên lớp -->
			        <div class="form-group">
			        	<label class="control-label col-sm-12">Tên lớp học:</label>
			            <div class="col-sm-12">
			            	<input type="text" class="form-control" name="txtTenLopHoc" id="txtTenLopHoc">
			            	<span id="tenLopHocErr"></span>
			            </div> 
			        </div>    
			        <!-- button -->
			        <div class="form-group">
			        	<div class="row">
			        		<div class="col-md-4"></div>
			        		<div class="col-md-6">
			        			<input type="reset" class="btn btn-outline-warning" value="Nhập lại">
			        			<input type="submit" class="btn btn-outline-primary" value="Thêm lớp">        			
			        		</div>
			        	</div>
			        </div>  
			    </form>
            </div> <!-- /.modal-body -->
        
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection

<!-- Validation -->
@push('validate')
<script type="text/javascript">
    $(document).ready(function(){
        $('#add_form').submit(function(){
        	var nganhHoc = $('#sltNganhHoc').val();
            var tenVietTat = $.trim($('#txtTenVietTat').val());
            var tenLopHoc = $.trim($('#txtTenLopHoc').val());
            var flag = true;

            if(nganhHoc == 0)
            {
            	$('#sltNganhHocErr').text('Hãy chọn 1 ngành học.');
            	flag = false;
            }else
            {
            	$('#sltNganhHocErr').text('');
            }

            if(tenVietTat == '' || tenVietTat.length > 10)
            {
                $('#tenVietTatErr').text('Tên viết tắt lớp học phải nhỏ hơn 10 ký tự.');
                flag = false;
            }else
            {
                $('#tenVietTatErr').text('');
            }
            if(tenLopHoc == '' || tenLopHoc.length > 50)
            {
                $('#tenLopHocErr').text('Tên lớp học phải nhỏ hơn 50 ký tự. ');
                flag = false;
            }else 
            {
                $('#tenLopHocErr').text('');
            }
            return flag;
        });
    });
</script>
@endpush