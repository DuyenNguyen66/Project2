@extends('master')
@section('title','Danh sách ngành học')
@section('content')

<div class="card">
    <div class="card-header">
        <h1>Danh sách ngành học</h1>
        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modelThem">Thêm ngành học</a>
    </div><!-- /.card-header -->

    <div class="card-body">
        
        @if(session('err_add'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('err_add')}}
            </div>
        @endif        
        <table id="example2" class="table table-bordered table-striped">   
            <thead>
                <tr>
                    <th>Mã ngành học</th>
                    <th>Tên viết tắt</th>
                    <th>Tên ngành học</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($danhSachNganh as $nganhHoc)
                <tr>
                    <td>{{$nganhHoc->ma_nganh_hoc}}</td>
                    <td>{{$nganhHoc->ten_viet_tat_nganh}}</td>
                    <td>{{$nganhHoc->ten_nganh_hoc}}</td>
                    <td><a href="{{route('suaNganhHoc',['maNganh' => $nganhHoc->ma_nganh_hoc])}}">
                        <i class="fa fa-edit fa-2x"></i>
                    </a></td> 
                </tr>
                @endforeach
            </tbody> 
        </table>
    </div><!-- /.card-body -->
</div><!-- /.card -->

<!-- Modal thêm ngành học-->
<div class="modal fade" id="modelThem">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm ngành học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('themNganhHoc')}}" id="add_form" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- tên viết tắt -->
                    <div class="form-group">
                        <label class="control-label col-sm-12">Tên viết tắt:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="txtTenVietTat" id="txtTenVietTat">
                            <span id="tenVietTatErr"></span>
                        </div> 
                    </div>
                    <!-- tên ngành -->
                    <div class="form-group">
                        <label class="control-label col-sm-12">Tên ngành học:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="txtTenNganhHoc" id="txtTenNganhHoc">
                            <span id="tenNganhHocErr"></span>
                        </div> 
                    </div>
                    <!-- button -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <input type="reset" class="btn btn-outline-warning" value="Nhập lại">
                                <input type="submit" class="btn btn-outline-primary" value="Thêm ngành">                  
                            </div>
                        </div>
                    </div>  
                </form>
            </div> <!-- /.modal-body -->

        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
@endsection

<!-- Validation -->
@push('validate')
<script type="text/javascript">
    $(document).ready(function(){
        $('#add_form').submit(function(){
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
