<option value="0">--Chọn môn--</option>
@foreach($danhSachMon as $monHoc)
<option value="{{$monHoc->ma_mon_hoc}}">{{$monHoc->ten_mon_hoc}}</option>
@endforeach