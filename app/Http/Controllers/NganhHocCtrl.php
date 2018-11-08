<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NganhHoc;

class NganhHocCtrl extends Controller
{
    public function hienThiDanhSach()
    {
    	$arr = NganhHoc::getAll();
    	return view('nganh_hoc.danh_sach_nganh_hoc',['danhSachNganh' => $arr]);
    }

    public function themNganhHocXuLy(Request $request)
    {
    	$nganhHoc = new NganhHoc();
    	$nganhHoc->ten_viet_tat_nganh = $request->txtTenVietTat;
    	$nganhHoc->ten_nganh_hoc = $request->txtTenNganhHoc;
        $count = NganhHoc::kiemTraTonTai($nganhHoc);
        if($count == 0)
        {
        	NganhHoc::insert($nganhHoc);
        	return redirect()->route('danhSachNganh');
        }else
        {
            return redirect()->route('danhSachNganh')->with('err_add','Ngành học đã tồn tại, vui lòng nhập lại.');
        }
    }

    public function suaNganhHoc($maNganh)
    {
    	$obj = new NganhHoc();
    	$obj = NganhHoc::getById($maNganh);
    	return view('nganh_hoc.sua_nganh_hoc',['nganhHoc' => $obj]);
    } 
    
    public function suaNganhHocXuLy($maNganh, Request $request)
    {
    	$nganhHoc = new NganhHoc();
    	$nganhHoc->ma_nganh_hoc = $maNganh;
        $nganhHoc->ten_viet_tat_nganh = $request->txtTenVietTat;
    	$nganhHoc->ten_nganh_hoc = $request->txtTenNganhHoc;
    	NganhHoc::edit($nganhHoc);
    	return redirect()->route('danhSachNganh');
    }
}
