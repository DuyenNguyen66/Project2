<!-- table -->
<table class="table table-bordered table-striped" >
	<thead>
		
	</thead>
	<tbody>
		@foreach($danhSachThongKe as $obj)
		<tr>
			<?php
				if($obj->tinh_trang == 0)
				{
			?>
					<td>Số sinh viên chưa đăng ký</td>
			<?php
				}elseif($obj->tinh_trang == 1)
				{
			?>
					<td>Số sinh viên đã đăng ký</td>
			<?php
				}else
				{
			?>
					<td>Số sách đã phát</td>
			<?php
				}
			?>
			<td>{{$obj->so_luong}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
