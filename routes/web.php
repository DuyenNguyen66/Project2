<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('master');
});

//Quản lý tài khoản
Route::group(['prefix' => 'taiKhoan'],function(){
	Route::get('register',['as' => 'register','uses' => 'TaiKhoanCtrl@dangKy']);
	Route::post('register',['as' => 'register','uses' => 'TaiKhoanCtrl@dangKyXuLy']);
	Route::get('login',['as' => 'login','middleware' => 'loginMiddle2','uses' => 'TaiKhoanCtrl@dangNhap']); 
	Route::post('login',['as' => 'login','uses' => 'TaiKhoanCtrl@dangNhapXuLy']);
	Route::get('logout',['as' => 'logout','uses' => 'TaiKhoanCtrl@dangXuat']);
	Route::get('thongTin',['as' => 'thongTin','uses' => 'TaiKhoanCtrl@hienThiTaiKhoan']);
	Route::get('quenMatKhau',['as' => 'quenMatKhau','uses' => 'TaiKhoanCtrl@quenMatKhau']);
	Route::get('quenMatKhauXuLy',['as' => 'quenMatKhauXuLy','uses' => 'TaiKhoanCtrl@quenMatKhauXuLy']);
});

//Quản lý ngành học
Route::group(['prefix' => 'nganhHoc'],function(){
	Route::get('danhSachNganh',['as' => 'danhSachNganh','middleware' => 'loginMiddle','uses' => 'NganhHocCtrl@hienThiDanhSach']);
	Route::post('themNganhHoc',['as' => 'themNganhHoc','uses' => 'NganhHocCtrl@themNganhHocXuLy']);
	Route::get('suaNganhHoc/{maNganh}',['as' => 'suaNganhHoc','uses' => 'NganhHocCtrl@suaNganhHoc']);
	Route::post('suaNganhHoc/{maNganh}',['as' => 'suaNganhHoc','uses' => 'NganhHocCtrl@suaNganhHocXuLy']);
});

//Quản lý môn học
Route::group(['prefix' => 'monHoc'],function(){
	Route::get('danhSachMon',['as' => 'danhSachMon','uses' => 'MonHocCtrl@hienThiDanhSach']);
	Route::post('themMonHoc',['as' => 'themMonHoc','uses' => 'MonHocCtrl@themMonHocXuLy']);
	Route::get('suaMonHoc/{maMon}/{maNganh}',['as' => 'suaMonHoc','uses' => 'MonHocCtrl@suaMonHoc']); 
	Route::post('suaMonHoc/{maMon}/{maNganh}',['as' => 'suaMonHoc','uses' => 'MonHocCtrl@suaMonHocXuLy']);
});

//Quản lý lớp học
Route::group(['prefix' => 'lopHoc'],function(){
	Route::get('danhSachLop',['as' => 'danhSachLop','uses' => 'LopHocCtrl@hienThiDanhSach']);
	Route::post('themLopHoc',['as' => 'themLopHoc','uses' => 'LopHocCtrl@themLopHocXuLy']);
	Route::get('suaLopHoc/{maLop}/{maNganh}',['as' => 'suaLopHoc','uses' => 'LopHocCtrl@suaLopHoc']);
	Route::post('suaLopHoc/{maLop}/{maNganh}',['as' => 'suaLopHoc','uses' => 'LopHocCtrl@suaLopHocXuLy']);
});

//Quản lý sinh viên
Route::group(['prefix' => 'sinhVien'],function(){
	Route::get('danhSachSinhVien',['as' => 'danhSachSinhVien','uses' => 'SinhVienCtrl@hienThiDanhSach']);
	Route::get('selectBox',['as' => 'selectBox','uses' => 'SinhVienCtrl@getLopByMaNganh']);
	Route::get('bangSinhVien',['as' => 'bangSinhVien','uses' => 'SinhVienCtrl@hienThiDanhSachTheoLop']);
	Route::post('themSinhVien',['as' => 'themSinhVien','uses' => 'SinhVienCtrl@themSinhVienXuLy']);
});

//Quản lý lịch học
Route::group(['prefix' => 'lichHoc'],function(){
	Route::get('danhSachLichHoc/{maNganh}',['as' => 'danhSachLichHoc','uses' => 'LichHocCtrl@hienThiDanhSach']);
	Route::post('themLichHoc',['as' => 'themLichHoc','uses' => 'LichHocCtrl@themLichHocXuLy']);
	Route::get('suaLichHoc/{maLich}/{maNganh}/{maMon}/{ngayBD}',['as' => 'suaLichHoc','uses' => 'LichHocCtrl@suaLichHoc']);
	Route::post('suaLichHoc/{maLich}/{maNganh}/{maMon}/{ngayBD}',['as' => 'suaLichHoc','uses' => 'LichHocCtrl@suaLichHocXuLy']);
});

//Quản lý tình trạng phát sách
Route::group(['prefix' => 'tinhTrang'],function(){
	Route::get('quanLyTinhTrang/{maLich}/{maLop}/{maMon}',['as' => 'quanLyTinhTrang','uses' => 'TinhTrangCtrl@hienThiDanhSach']);
	Route::get('update','TinhTrangCtrl@updateTT')->name('update');
	Route::get('danhSachThongKe/{maNganh}',['as' => 'danhSachThongKe','uses' => 'TinhTrangCtrl@hienThi']);
	Route::get('selectMon',['as' => 'selectMon','uses' => 'TinhTrangCtrl@getMonByMaLop']);
	Route::get('bangThongKe',['as' => 'bangThongKe','uses' => 'TinhTrangCtrl@thongKeSoLuong']);

});
