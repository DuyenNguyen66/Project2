	<option value="0">--Chọn lớp--</option>
@foreach($danhSachLop as $obj)
	<option value="{{$obj->ma_lop_hoc}}">{{$obj->ten_lop_hoc}}</option>
@endforeach