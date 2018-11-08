<!-- danh sách sinh viên theo lớp -->
	<table id="table_sinhvien" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Mã sinh viên</th>
				<th>Tên sinh viên</th>
				<th>Ngày sinh</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@foreach($danhSachSinhVien as $sinhVien)
			<tr>
				<td>{{$sinhVien->ma_sinh_vien}}</td>
				<td>{{$sinhVien->ten_sinh_vien}}</td>
				<td>{{$sinhVien->ngay_sinh}}</td>
				<td>{{$sinhVien->email}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

<script type="text/javascript">
	$(document).ready(function(){
		$('#table_sinhvien').DataTable();
	});
</script>


