@extends('master')
@section('title','Sửa ngành học')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sửa ngành học</h3>
    </div><!-- /.card-header --> 
    
    <!-- form -->
    <div class="card-body">
        <form action="{{route('suaNganhHoc',['maNganh' => $nganhHoc->ma_nganh_hoc])}}" id="edit_form" class="form-horizontal" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <!-- mã ngành -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
                    <label class="control-label ">Mã ngành học:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" value="{{$nganhHoc->ma_nganh_hoc}}" name="txtMaNganhHoc" readonly="readonly">
                </div> 
            </div>

            <!-- tên viết tắt -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
                    <label class="control-label ">Tên viết tắt:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" value="{{$nganhHoc->ten_viet_tat_nganh}}" name="txtTenVietTat" id="txtTenVietTat" class="form-control">
                    <span id="tenVietTatErr"></span>
                </div> 
            </div>

            <!-- tên ngành học -->
            <div class="form-group first-child row">
                <div class="col-sm-2">
                    <label class="control-label ">Tên ngành học:</label>
                </div>
                <div class="col-sm-6">
                    <input type="text" value="{{$nganhHoc->ten_nganh_hoc}}" name="txtTenNganhHoc" id="txtTenNganhHoc" class="form-control">
                    <span id="tenNganhHocErr"></span>
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

<!-- Validation -->
@push('validate')
<script type="text/javascript">
    $(document).ready(function(){
        $('#edit_form').submit(function(){
            var tenVietTat = $.trim($('#txtTenVietTat').val());
            var tenNganhHoc = $.trim($('#txtTenNganhHoc').val());
            var flag = true;

            if(tenVietTat == '' || tenVietTat.length > 10)
            {
                $('#tenVietTatErr').text('Tên viết tắt ngành học phải nhỏ hơn 10 ký tự.');
                flag = false;
            }else
            {
                $('#tenVietTatErr').text('');
            }
            if(tenNganhHoc == '' || tenNganhHoc.length > 50)
            {
                $('#tenNganhHocErr').text('Tên ngành học phải nhỏ hơn 50 ký tự. ');
                flag = false;
            }else 
            {
                $('#tenNganhHocErr').text('');
            }
            return flag;
        });
    });
</script>
@endpush