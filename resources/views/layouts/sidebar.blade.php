<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('image/logo.png')}}" class="img-rounded" alt="Logo" width="230" height="55">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Tên tài khoản -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('image/ava.png')}}" alt="Ava" class="img-circle elevation-2" width="50" height="50">
            </div>
            <div class="info">
                @if(session()->has('user'))
                <a href="{{route('thongTin')}}" class="d-block" style="color: white">{{session()->get('user')}}</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Quản lý danh sách
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('danhSachNganh')}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Danh sách ngành học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhSachMon')}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Danh sách môn học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhSachLop')}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Danh sách lớp học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhSachSinhVien')}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>Danh sách sinh viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
              
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Quản lý lịch học
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach($danhSachNganh as $nganhHoc)
                        <li class="nav-item">
                            <a href="{{route('danhSachLichHoc',['maNganh' => $nganhHoc->ma_nganh_hoc])}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>{{$nganhHoc->ten_nganh_hoc}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Thống kê
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach($danhSachNganh as $nganhHoc)
                        <li class="nav-item">
                            <a href="{{route('danhSachThongKe',['maNganh' => $nganhHoc->ma_nganh_hoc])}}" class="nav-link">
                                <i class="fa fa-angle-right nav-icon"></i>
                                <p>{{$nganhHoc->ten_nganh_hoc}}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
              
                <li class="nav-header">Tài khoản</li>
                <li class="nav-item">
                    <a href="{{route('thongTin')}}" class="nav-link">
                        <i class="nav-icon fa fa-info"></i>
                        <p>Thông tin tài khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>