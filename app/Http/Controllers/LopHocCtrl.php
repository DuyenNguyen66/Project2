<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LopHoc;
use App\NganhHoc;

class LopHocCtrl extends Controller
{
    public function hienThiDanhSach()
    {
    	$arr = LopHoc::getAll();
    	return view('lop_hoc.danh_sach_lop_hoc',['danhSachLop' => $arr]);
    }

    public function themLopHoc()
    {
    	$arr = NganhHoc::getAll();
    	return view('lop_hoc.them_lop_hoc',['danhSachNganh' => $arr]);
    }

    public function themLopHocXuLy(Request $request)
    {
    	$lopHoc = new LopHoc();
    	$lopHoc->ma_lop_hoc = $request->txtMaLopHoc;
        $lopHoc->ten_viet_tat_lop = $request->txtTenVietTat;
    	$lopHoc->ten_lop_hoc = $request->txtTenLopHoc;
    	$lopHoc->ma_nganh_hoc = $request->sltNganhHoc;
        $count = LopHoc::kiemTraTonTai($lopHoc);
        if($count == 0)
        {
            LopHoc::insert($lopHoc);
            return redirect()->route('danhSachLop');
        }else
        {
            return redirect()->route('danhSachLop')->with('err_add','Lớp học đã tồn tại, vui lòng nhập lại.');
        }
    }

    public function suaLopHoc($maLop,$maNganh)
    {
    	$obj = new LopHoc();
    	$obj = LopHoc::getById($maLop);
    	$arr = NganhHoc::getAll();
    	return view('lop_hoc.sua_lop_hoc',['lopHoc' => $obj,'dachSachNganh' => $arr,'maNganh' => $maNganh]);
    }

    public function suaLopHocXuLy($maLop, Request $request)
    {
    	$lopHoc = new LopHoc();
    	$lopHoc->ma_lop_hoc = $request->txtMaLopHoc;
        $lopHoc->ten_viet_tat_lop = $request->txtTenVietTat;
    	$lopHoc->ten_lop_hoc = $request->txtTenLopHoc;
    	$lopHoc->ma_nganh_hoc = $request->sltNganhHoc;
    	LopHoc::edit($lopHoc);
    	return redirect()->route('danhSachLop');
    }
}
