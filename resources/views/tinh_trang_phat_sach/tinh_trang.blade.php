@extends('master')
@section('title','Quản lý đăng ký sách')
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Tình trạng phát sách</h1>
        <p>Danh sách sinh viên lớp: {{$lopHoc->ten_viet_tat_lop}}</p>
        <p>Môn học: {{$monHoc->ten_viet_tat_mon}}</p>
    </div><!-- /.card-header -->

    <div class="card-body">
	    <!-- table -->
		<table id="example" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Mã sinh viên</th>
					<th>Tên sinh viên</th>
					<th>Tình trạng phát sách</th>
				</tr>
			</thead>
			<tbody>
				@foreach($danhSachSinhVien as $sinhVien)
				<tr>
					<td>{{$sinhVien->ma_sinh_vien}}</td>
					<td>{{$sinhVien->ten_sinh_vien}}</td>
					<td>
						<select name="tinhTrang" class="form-control tinhTrang" data-ma_sinh_vien="{{$sinhVien->ma_sinh_vien}}" data-ma_lich_hoc="{{$sinhVien->ma_lich_hoc}}">
							<option value="0" <?php if($sinhVien->tinh_trang == 0) echo 'selected'?>>Chưa đăng ký</option>
							<option value="1" <?php if($sinhVien->tinh_trang == 1) echo 'selected'?>>Đã đăng ký</option>
							<option value="2" <?php if($sinhVien->tinh_trang == 2) echo 'selected'?>>Đã phát sách</option>
						</select>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> <!-- card-body -->
</div> <!-- card -->

@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('.tinhTrang').change(function(){
			var tinhTrang = $(this).val();
			var maSv = $(this).data('ma_sinh_vien');
			var maLich = $(this).data('ma_lich_hoc');
			$.get('{{route("update")}}',{tinhTrang:tinhTrang, maSv:maSv, maLich:maLich} , function(data){
			});
		});
		$('#example').DataTable();
	});
</script>
@endpush