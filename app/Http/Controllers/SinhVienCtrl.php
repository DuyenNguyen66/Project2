<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SinhVien;
use App\NganhHoc;
use App\LopHoc;
use App\LichHoc;
use Excel;

class SinhVienCtrl extends Controller
{
    public function hienThiDanhSach()
    {
        $arrNganh = NganhHoc::getAll();
        $arrLop = LopHoc::getAll();
        return view('sinh_vien.danh_sach_sinh_vien',['danhSachNganh' => $arrNganh,'danhSachLop' => $arrLop]);
    }

    public function getLopByMaNganh(Request $rq)
    {
        $maNganh = $rq->maNganh;
        $arrLopByMaNganh = LichHoc::getLopByMaNganh($maNganh);
        return view('sinh_vien.select_lop',['danhSachLop' => $arrLopByMaNganh]);
    }

    //hiển thị danh sách sv theo mã lớp được select
    public function hienThiDanhSachTheoLop(Request $rq)
    {     
        $maLop = $rq->maLop;  
        $arrSv = SinhVien::getByMaLop($maLop);
        return view('sinh_vien.bang_sinh_vien',['danhSachSinhVien' => $arrSv]);  
    }

    //import file excel
    public function themSinhVienXuLy(Request $request) 
    {
        $maLop = $request->get('ma_lop');
        $danhSachSinhVien = array();
        if($request->hasFile('file_name'))
        {
            //lấy đường dẫn file
            $path = $request->file('file_name')->getRealPath();
            $data = Excel::load($path)->get();
            if($data->count())
            {
                foreach($data as $key => $value)
                {
                    $danhSachSinhVien[] = [
                        'ma_sinh_vien' => $value->ma_sinh_vien,
                        'ten_sinh_vien' => $value->ten_sinh_vien,
                        'ngay_sinh' => $value->ngay_sinh,
                        'email' => $value->email,
                        'ma_lop_hoc' => $maLop
                    ];
                } 
                if(!empty($danhSachSinhVien)) 
                {
                    SinhVien::insert($danhSachSinhVien);
                    session()->flash('success_excel','Thêm sinh viên thành công.');
                }
            }
        }
        else
        {
            session()->flash('error_excel','Không có file excel.');
        }

        //hiển thị danh sách sv vừa thêm
        $arrLop = LopHoc::getAll();
        $obj = LopHoc::getById($maLop);
        $arr = SinhVien::getByMaLop($maLop);
        return view('sinh_vien.danh_sach_sinh_vien',['danhSachSinhVien' => $arr,'danhSachLop' => $arrLop,'lopHoc' => $obj]);
    }

}
