@extends('master')
@section('title','Thông tin tài khoản')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Thông tin tài khoản</h1>
    </div><!-- /.card-header -->

    <div class="card-body">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>Họ và tên</th>
					<td>{{$taiKhoan->ten_giao_vu}}</td>
				</tr>
				<tr>
					<th>Tên tài khoản</th>
					<td>{{$taiKhoan->ten_tai_khoan}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection