@extends('master')
@section('title','Danh sách lịch học')
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Danh sách lịch học</h1>
        <p>Chuyên Ngành: {{$nganhHoc->ten_nganh_hoc}} ({{$nganhHoc->ten_viet_tat_nganh}})</p>
        
        <!-- thông báo hết hạn đăng ký -->
        @if(count($danhSachLichHoc) > 0)
        <div class="alert alert-danger alert-dismissible fade show">
    	    <button type="button" class="close" data-dismiss="alert">&times;</button>
    	    <div id="div_alert"></div>
    	</div>
    	@endif
    	<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelThem">Thêm lịch học</a>
    </div><!-- /.card-header -->

    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">  
			<thead>
				<tr>
					<th style="display:none;"></th>
					<th>Tên viết tắt</th> 
					<th>Tên lớp học</th>
					<th>Tên môn học</th>
					<th>Ngày bắt đầu</th>
					<th>Thời hạn đăng ký</th>
					<th>Sửa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($danhSachLichHoc as $lichHoc)
				<tr>
					<!-- link sang bảng tình trạng đăng ký sách -->		
					<td class="maLich" data-ten_viet_tat_lop="{{$lichHoc->ten_viet_tat_lop}}" data-thoi_han="{{$lichHoc->thoi_han}}" 
						data-ten_viet_tat_mon="{{$lichHoc->ten_viet_tat_mon}}" style="display: none;"></td>		
					<td>
						<a href="{{route('quanLyTinhTrang',['maLich' => $lichHoc->ma_lich_hoc,'maLop' => $lichHoc->ma_lop_hoc,'maMon' => $lichHoc->ma_mon_hoc])}}"
							class="btn btn-outline-danger" data-toggle="popover" data-trigger="hover" data-content="Tình trạng phát sách">
							{{$lichHoc->ten_viet_tat_lop}}
						</a>
					</td>
					<td>{{$lichHoc->ten_lop_hoc}}</td>
					<td>{{$lichHoc->ten_mon_hoc}}</td>
					<td>{{$lichHoc->ngay_bat_dau}}</td>
					<td>{{$lichHoc->thoi_han}}</td>
					<td><a href="{{route('suaLichHoc',['maLich' => $lichHoc->ma_lich_hoc,'maNganh' => $nganhHoc->ma_nganh_hoc,'maMon' => $lichHoc->ma_mon_hoc,'ngayBD' => $lichHoc->ngay_bat_dau])}}" >
						<i class="fa fa-edit fa-2x"></i>
					</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<!-- Modal thêm lịch học-->
<div class="modal fade" id="modelThem">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm lịch học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('themLichHoc',['maNganh' => $nganhHoc->ma_nganh_hoc])}}" method="post" id="add_form" class="form-horizontal">
			        <input type="hidden" name="_token" value="{{csrf_token()}}">
					<!-- chọn lớp -->
					<div class="form-group">
			        	<label class="control-label col-sm-12">Lớp học:</label>
			        	<div class="col-sm-12">
					      	<select class="form-control" name="sltLopHoc" id="sltLopHoc">
					      		<option value="0">--Chọn lớp--</option>
						        @foreach($danhSachLop as $lopHoc)
								<option value="{{$lopHoc->ma_lop_hoc}}">{{$lopHoc->ten_lop_hoc}}</option>
								@endforeach
					      	</select>
					      	<span id="sltLopHocErr"></span>
				      	</div>
			        </div>
			        <!-- chọn môn -->
					<div class="form-group">
			        	<label class="control-label col-sm-12">Môn học:</label>
			        	<div class="col-sm-12">
					      	<select class="form-control" name="sltMonHoc" id="sltMonHoc">
					      		<option value="0">--Chọn môn--</option>
						        @foreach($danhSachMon as $monHoc)
								<option value="{{$monHoc->ma_mon_hoc}}">{{$monHoc->ten_mon_hoc}}</option>
								@endforeach
					      	</select>
					      	<span id="sltMonHocErr"></span>
				      	</div>
			        </div>
			        <!-- chọn ngày bắt đầu -->
					<div class="form-group">
			        	<label class="control-label col-sm-12">Ngày bắt đầu:</label>
			        	<div class="col-sm-12">
					      	<input type="date" name="ngayBatDau" class="form-control">
					      	<span id="ngayBatDauErr"></span>
				      	</div>
			        </div>
			        <!-- button -->
			        <div class="form-group">
			        	<div class="row">
			        		<div class="col-md-4"></div>
			        		<div class="col-md-6">
			        			<input type="reset" class="btn btn-outline-warning" value="Nhập lại">
			        			<input type="submit" class="btn btn-outline-primary" value="Thêm lịch">        			
			        		</div>
			        	</div>
			        </div>  
			    </form>
            </div> <!-- /.modal-body -->
        
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection

@push('hover') 
	<script> //hover on button Lớp
		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover();   
		});
	</script>
@endpush

@push('alert') 
	<script type="text/javascript"> //tìm các lớp hết hạn đăng ký sách
		$(document).ready(function(){
			var text = "Những lớp sau đã hết hạn đăng ký, hãy nhắc nhở:<br>";
			var index = 1;
			$('.maLich').each(function () {
				var ten_viet_tat_lop = $(this).data('ten_viet_tat_lop');
				var ten_viet_tat_mon = $(this).data('ten_viet_tat_mon');
				var ngayHienTai = (new Date()).getDate();
				var thoiHan = (new Date($(this).data('thoi_han'))).getDate();
				var time = ngayHienTai - thoiHan;
				if(time >= 0)
				{
					text += `${index}. Lớp ${ten_viet_tat_lop} - Môn ${ten_viet_tat_mon}<br>`;
					index++;
				}
			});
			if(index != 1){
				$("#div_alert").html(text);
				$("#div_alert").show();
			}
		});
	</script>
@endpush

@push('validate')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#add_form').submit(function(){
				var lopHoc = $('#sltLopHoc').val();
				var monHoc = $('#sltMonHoc').val();
				var flag = true;

				if(lopHoc == 0)
				{
					$('#sltLopHocErr').text('Hãy chọn 1 lớp học.');
					flag = false;
				}else 
				{
					$('#sltLopHocErr').text('');
				}

				if(monHoc == 0)
				{
					$('#sltMonHocErr').text('Hãy chọn 1 môn học.');
					$('#ngayBatDauErr').text('Hãy chọn 1 ngày.');
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