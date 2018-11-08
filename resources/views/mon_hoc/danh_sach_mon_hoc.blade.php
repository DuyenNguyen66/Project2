@extends('master')
@section('title','Danh sách môn học')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Danh sách môn học</h1>
        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelThem">Thêm môn học</a>
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
					<th>Mã môn học</th>
					<th>Tên viết tắt</th>
					<th>Tên môn học</th>
					<th>Ngành học</th>
					<th>Sửa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($danhSachMon as $monHoc)
				<tr>
					<td>{{$monHoc->ma_mon_hoc}}</td>
					<td>{{$monHoc->ten_viet_tat_mon}}</td>
					<td>{{$monHoc->ten_mon_hoc}}</td>
					<td>{{$monHoc->ten_nganh_hoc}}</td>
					<td><a href="{{route('suaMonHoc',['maMon' => $monHoc->ma_mon_hoc,'maNganh' => $monHoc->ma_nganh_hoc])}}">
						<i class="fa fa-edit fa-2x"></i>
					</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal thêm môn học-->
<div class="modal fade" id="modelThem">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm môn học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('themMonHoc')}}" class="form-horizontal" method="post" id="add_form">
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
			        <!-- tên môn -->
			        <div class="form-group">
			        	<label class="control-label col-sm-12">Tên môn học:</label>
			            <div class="col-sm-12">
			            	<input type="text" class="form-control" name="txtTenMonHoc" id="txtTenMonHoc">
			            	<span id="tenMonHocErr"></span>
			            </div> 
			        </div>    
			        <!-- button -->
			        <div class="form-group">
			        	<div class="row">
			        		<div class="col-md-4"></div>
			        		<div class="col-md-6">
			        			<input type="reset" class="btn btn-outline-warning" value="Nhập lại">
			        			<input type="submit" class="btn btn-outline-primary" value="Thêm môn">        			
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
            var tenMonHoc = $.trim($('#txtTenMonHoc').val());
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
                $('#tenVietTatErr').text('Tên viết tắt môn học phải nhỏ hơn 10 ký tự.');
                flag = false;
            }else
            {
                $('#tenVietTatErr').text('');
            }
            if(tenMonHoc == '' || tenMonHoc.length > 50)
            {
                $('#tenMonHocErr').text('Tên môn học phải nhỏ hơn 50 ký tự. ');
                flag = false;
            }else 
            {
                $('#tenMonHocErr').text('');
            }
            return flag;
        });
    });
</script>
@endpush