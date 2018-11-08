@extends('master')
@section('title','Thống kê số lượng')
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Thống kê số lượng</h1>
        <p>Chuyên Ngành: {{$nganhHoc->ten_nganh_hoc}} ({{$nganhHoc->ten_viet_tat_nganh}})</p>
    </div><!-- /.card-header -->

    <div class="card-body">
    	<!-- chọn lớp để hiển thị danh sách -->
        <div class="row">
            <h5>Chọn lớp và môn học để xem thống kê:</h5>
        </div>
    	<div class="row">
            <div class="col-sm-2"></div>
    		<div class="col-sm-4">
    			<select class="form-control ma_lop" >
                    <option value="0">--Chọn lớp--</option>
                    @foreach($danhSachLop as $lopHoc)
                    <option value="{{$lopHoc->ma_lop_hoc}}">{{$lopHoc->ten_lop_hoc}}</option>
                    @endforeach
                </select>
    		</div>        
            <div class="col-sm-4">
        		<select class="form-control mon_hoc" >
        			<option value="0">--Chọn môn--</option>
		    	</select>
    	    </div>	    
        </div>
        <!-- bảng thông kê -->
        <div class="row">
            <div class="col-sm-3"></div>
            <div id="hienThi" class="col-md-6"></div>
        </div>

	</div> <!-- card-body -->
</div> <!-- card -->
@endsection

@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('.ma_lop').change(function(){
			var maLop = $(this).val();
			$.get("{{route('selectMon')}}",{maLop:maLop},function(data){
				$('.mon_hoc').html(data);
                $('.mon_hoc').change(function(){
                    var maMon = $(this).val();
                    $.get("{{route('bangThongKe')}}",{maLop:maLop, maMon:maMon},function(data)
                    {
                        $('#hienThi').html(data);
                    });
                });
			});
		});
	});
</script>
@endpush