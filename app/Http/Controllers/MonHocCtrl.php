<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonHoc;
use App\NganhHoc;

class MonHocCtrl extends Controller
{
    public function hienThiDanhSach()
    {
    	$arr = MonHoc::getAll();
    	return view('mon_hoc.danh_sach_mon_hoc',['danhSachMon' => $arr]);
    }

    public function themMonHocXuLy(Request $request)
    {
    	$monHoc = new MonHoc();
        $monHoc->ten_viet_tat_mon = $request->txtTenVietTat;
    	$monHoc->ten_mon_hoc = $request->txtTenMonHoc;
    	$monHoc->ma_nganh_hoc = $request->sltNganhHoc;
        $count = MonHoc::kiemTraTonTai($monHoc);
        if($count == 0)
        {
        	MonHoc::insert($monHoc);
        	return redirect()->route('danhSachMon');
        }else
        {
            return redirect()->route('danhSachMon')->with('err_add','Môn học đã tồn tại, vui lòng nhập lại.');
        }
    }

    public function suaMonHoc($maMon,$maNganh)
    {
    	$obj = new MonHoc();
    	$obj = MonHoc::getById($maMon);
    	$arr = NganhHoc::getAll();
    	return view('mon_hoc.sua_mon_hoc',['monHoc' => $obj, 'danhSachNganh' => $arr,'maNganh' => $maNganh]);
    }

    public function suaMonHocXuLy($maMon, Request $request)
    {
    	$monHoc = new MonHoc();
    	$monHoc->ma_mon_hoc = $maMon;
        $monHoc->ten_viet_tat_mon = $request->txtTenVietTat;
    	$monHoc->ten_mon_hoc = $request->txtTenMonHoc;
    	$monHoc->ma_nganh_hoc = $request->sltNganhHoc;
    	MonHoc::edit($monHoc);
    	return redirect()->route('danhSachMon');
    }
}
