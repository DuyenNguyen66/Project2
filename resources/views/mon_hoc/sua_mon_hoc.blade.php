@extends('master')
@section('title','Sửa môn học')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa môn học</h3>
    </div><!-- /.card-header --> 
    
    <!-- form -->
    <div class="card-body">
	   <form action="{{route('suaMonHoc',['maMon' => $monHoc->ma_mon_hoc,'maNganh' => $monHoc->ma_nganh_hoc])}}" class="form-horizontal" method="post" id="edit_form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

		<!-- chọn môn -->
		<div class="form-group first-child row">
            <div class="col-sm-2">
        	   <label class="control-label">Ngành học:</label>
            </div>
        	<div class="col-sm-3">
		      	<select class="form-control" name="sltNganhHoc">
			        @foreach($danhSachNganh as $nganhHoc)
					<option value="{{$nganhHoc->ma_nganh_hoc}}"
                        <?php if($nganhHoc->ma_nganh_hoc == $maNganh) echo 'selected'?>
                        >{{$nganhHoc->ten_nganh_hoc}}</option>
					@endforeach
		      	</select>
	      	</div>
        </div>

        <!-- mã môn -->
        <div class="form-group first-child row">
            <div class="col-sm-2">
        	   <label class="control-label">Mã môn học:</label>
            </div>
            <div class="col-sm-3">
            	<input type="text" class="form-control" value="{{$monHoc->ma_mon_hoc}}" name="txtMaMonHoc" readonly="readonly" >
            </div> 
        </div>

        <!-- tên viết tắt -->
        <div class="form-group first-child row">
            <div class="col-sm-2">
                <label class="control-label ">Tên viết tắt:</label>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$monHoc->ten_viet_tat_mon}}" name="txtTenVietTat" id="txtTenVietTat">
                <span id="tenVietTatErr"></span>
            </div> 
        </div> 

        <!-- tên môn -->
        <div class="form-group first-child row">
            <div class="col-sm-2">
        	   <label class="control-label ">Tên môn học:</label>
            </div>
            <div class="col-sm-6">
            	<input type="text" class="form-control" value="{{$monHoc->ten_mon_hoc}}" name="txtTenMonHoc" id="txtTenMonHoc">
                <span id="tenMonHocErr"></span>
            </div> 
        </div>    

        <!-- button -->
        <div class="form-group">
        	<div class="row">
        		<div class="col-md-4"></div>
        		<div class="col-md-4">
        			<input type="submit" class="btn btn-outline-primary" value="Sửa thông tin">        			
        		</div>
        	</div>
        </div>  
        </form>
    </div>
</div>
@endsection

<!-- Validation -->
@push('validate')
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_form').submit(function(){
            var tenVietTat = $.trim($('#txtTenVietTat').val());
            var tenMonHoc = $.trim($('#txtTenMonHoc').val());
            var flag = true;

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