@extends('master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa lớp học</h3>
    </div><!-- /.card-header --> 
    
    <!-- form -->
    <div class="card-body">
    	<form action="{{route('suaLopHoc',['maLop' => $lopHoc->ma_lop_hoc,'maNganh' => $lopHoc->ma_nganh_hoc])}}" class="form-horizontal" method="post" id="edit_form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
    		<!-- chọn ngành -->
    		<div class="form-group first-child row">
                <div class="col-sm-2">
                	<label class="control-label col-sm-12">Ngành học:</label>
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
            <!-- mã lớp -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
                	<label class="control-label col-sm-12">Mã lớp học:</label>
                </div>
                <div class="col-sm-3">
                	<input type="text" class="form-control" value="{{$lopHoc->ma_lop_hoc}}" name="txtMaLopHoc" readonly="readonly">
                </div> 
            </div>
            <!-- tên viết tắt -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
                    <label class="control-label col-sm-12">Tên viết tắt:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" id="txtTenVietTat" value="{{$lopHoc->ten_viet_tat_lop}}" name="txtTenVietTat" class="form-control">
                    <span id="tenVietTatErr"></span>
                </div> 
            </div>   
            <!-- tên lớp -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
            	   <label class="control-label col-sm-12">Tên lớp học:</label>
                </div>  
                <div class="col-sm-6">
                	<input type="text" id="txtTenLopHoc" value="{{$lopHoc->ten_lop_hoc}}" name="txtTenLopHoc" class="form-control">
                    <span id="tenLopHocErr"></span>
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
            var tenLopHoc = $.trim($('#txtTenLopHoc').val());
            var flag = true;

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