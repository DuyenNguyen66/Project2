@extends('master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa lịch học</h3>
    </div><!-- /.card-header --> 
    
    <!-- form -->
    <div class="card-body">
        <form action="{{route('suaLichHoc',['maLich' => $lichHoc->ma_lich_hoc,'maNganh' => $nganhHoc->ma_nganh_hoc,'maMon' => $lichHoc->ma_mon_hoc,'ngayBD' => $lichHoc->ngay_bat_dau])}}" class="form-horizontal" method="post" id="edit_form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

    		<!-- chọn lớp -->
    		<div class="form-group first-child row">
                <div class="col-sm-2">
            		<label class="control-label col-sm-12">Lớp học:</label>
            	</div>
            	<div class="col-sm-6">
    		      	<input type="text" class="form-control" name="txtLopHoc" value="{{$lichHoc->ten_lop_hoc}}" readonly="readonly"> 
    	      	</div>
            </div>

            <!-- chọn môn -->
    		<div class="form-group first-child row">
                <div class="col-sm-2">
            		<label class="control-label col-sm-12">Môn học:</label>
            	</div>
            	<div class="col-sm-6">
    		      	<select class="form-control" name="sltMonHoc" id="sltMonHoc">
    		      		<option value="0">--Chọn môn--</option>
    			        @foreach($danhSachMon as $monHoc)
    					<option value="{{$monHoc->ma_mon_hoc}}" 
                            <?php 
                            if ($monHoc->ma_mon_hoc == $maMon)
                                echo 'selected'
                            ?> >{{$monHoc->ten_mon_hoc}}
                        </option>
    					@endforeach
    		      	</select>
                    <span id="sltMonHocErr"></span>
    	      	</div>
            </div>

            <!-- chọn ngày bắt đầu -->
    		<div class="form-group first-child row">
                <div class="col-sm-2">
            		<label class="control-label col-sm-12">Ngày bắt đầu:</label>
            	</div>
            	<div class="col-sm-6">
    		      	<input type="date" name="ngayBatDau" class="form-control" value="{{$ngayBD}}">
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

@push('validate')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#edit_form').submit(function(){
                var monHoc = $('#sltMonHoc').val();
                var flag = true;

                if(monHoc == 0)
                {
                    $('#sltMonHocErr').text('Hãy chọn 1 môn học.');
                    flag = false;
                }else 
                {
                    $('#sltMonHocErr').text('');
                }
                return flag;
            });
        });
    </script>
@endpush