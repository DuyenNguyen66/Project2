@extends('master')
@section('title','Danh sách sinh viên')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Danh sách sinh viên</h1>
        <!-- button update file -->
        <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelThem">Thêm sinh viên</a>
    </div><!-- /.card-header -->

    <div class="card-body">
    	<!-- chọn lớp để hiển thị danh sách -->
        <div class="row">
            <h5>Chọn ngành và lớp để xem danh sách sinh viên</h5>
        </div>
    	<div class="row">
            <div class="col-md-2"></div>
            <div class="col-sm-4">
                <select class="form-control ma_nganh">
                    <option value="0">--Chọn ngành--</option>
                    @foreach($danhSachNganh as $nganhHoc)
                    <option value="{{$nganhHoc->ma_nganh_hoc}}">{{$nganhHoc->ten_nganh_hoc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
        		<select class="form-control ma_lop">
        			<option value="0">--Chọn lớp--</option>
		    	</select>
    	    </div>	    
        </div>

    	<!-- thông báo upload file excel -->
    	@if(session('success_excel'))
    	<div class="alert alert-success alert-dismissible fade show">
    	    <button type="button" class="close" data-dismiss="alert">&times;</button>
    	    {{session('success_excel')}} 
    	</div>
        @elseif(session('error_existed'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('error_existed')}} 
        </div>
    	@elseif(session('error_excel'))
    	<div class="alert alert-danger alert-dismissible fade show">
    	    <button type="button" class="close" data-dismiss="alert">&times;</button>
    	    {{session('error_excel')}} 
    	</div>
    	@endif

    	<!-- bảng danh sách sinh viên -->
    	<div id="div_sinhvien"></div>
    </div>
</div>

<!-- Modal thêm sinh vien-->
<div class="modal fade" id="modelThem">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm sinh viên</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('themSinhVien')}}" method="post" enctype="multipart/form-data" id="add_form" class="form-horizontal">
                	<input type="hidden" name="_token" value="{{csrf_token()}}">

                	<!-- submit mã lớp theo file excel -->
                	<div class="form-group first-child row">
            			<div class="col-sm-2">
                			<label class="control-label col-md-12">Lớp học:</label>
                		</div>
	                	<select class="form-control col-md-4" name="ma_lop" id="ma_lop">
		        			<option value="0">--Chọn lớp--</option>
						    @foreach($danhSachLop as $lopHoc)
							<option value="{{$lopHoc->ma_lop_hoc}}">{{$lopHoc->ten_lop_hoc}}</option>
							@endforeach
				    	</select>
                        <span id="ma_lopErr"></span>
				    </div>
	                
                    <!-- Chọn file excel -->
                    <div class="form-group">
                        <label class="control-label col-sm-12">Chọn file excel chứa danh sách sinh viên:</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="file_name">
                        </div> 
                    </div>

                    <!-- button -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-outline-primary" value="Thêm danh sách">                  
                            </div>
                        </div>
                    </div>  
                </form>
            </div> <!-- /.modal-body -->
        
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.ma_nganh').change(function(){
            var maNganh = $(this).val();
            $.get("{{route('selectBox')}}",{maNganh:maNganh},function(data){
                $('.ma_lop').html(data);
                $('.ma_lop').change(function(){
                    var maLop = $(this).val();
                    $.get("{{route('bangSinhVien')}}",{maLop:maLop},function(data){
                        $('#div_sinhvien').html(data);
                    });
                });
            });
        });
    });
</script>
@endpush

@push('validate')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_form').submit(function(){
                var maLop = $('#ma_lop').val();
                var flag = true;

                if(maLop == 0)
                {
                    $('#ma_lopErr').text('Hãy chọn 1 lớp.');
                    flag = false;
                }else 
                {
                    $('#ma_lopErr').text('');
                }
                return flag;
            });
        });
    </script>
@endpush