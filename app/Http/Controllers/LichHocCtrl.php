<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichHoc;
use App\LopHoc;
use App\MonHoc;
use App\NganhHoc;

class LichHocCtrl extends Controller
{
    public function hienThiDanhSach($maNganh) //lấy danh sách lớp, môn thuộc ngành đã chọn
    {
    	$obj = NganhHoc::getById($maNganh);
    	$arrLop = LichHoc::getLopByMaNganh($maNganh);
    	$arrMon = LichHoc::getMonByMaNganh($maNganh);
    	$arr = LichHoc::getByMaNganh($maNganh);
    	return view('lich_hoc.danh_sach_lich_hoc',['danhSachLichHoc' => $arr,'danhSachMon' => $arrMon,
    												'danhSachLop' => $arrLop,'nganhHoc' => $obj]);
    }

    public function themLichHocXuLy(Request $rq)
    {
    	$maNganh = $rq->maNganh;
    	$lichHoc = new LichHoc();
    	$lichHoc->ma_lop_hoc = $rq->sltLopHoc;
    	$lichHoc->ma_mon_hoc = $rq->sltMonHoc;
    	$lichHoc->ngay_bat_dau = $rq->ngayBatDau;
    	LichHoc::insert($lichHoc);
    	return redirect()->route('danhSachLichHoc',['maNganh' => $maNganh]);
    }

    public function suaLichHoc($maLich,$maNganh,$maMon,$ngayBD)
    {
    	$obj = LichHoc::getById($maLich);
    	$objNganh = NganhHoc::getById($maNganh);
    	$arrMon = LichHoc::getMonByMaNganh($maNganh);

    	return view('lich_hoc.sua_lich_hoc',['lichHoc' => $obj,'nganhHoc' => $objNganh,'danhSachMon' => $arrMon,'maMon' => $maMon,'ngayBD' => $ngayBD]);
    }
    
    public function suaLichHocXuLy($maLich,$maNganh,Request $rq)
    {
    	$lichHoc = new LichHoc();
    	$lichHoc->ma_lich_hoc = $maLich;
    	$lichHoc->ma_mon_hoc = $rq->sltMonHoc;
    	$lichHoc->ngay_bat_dau = $rq->ngayBatDau;
    	LichHoc::edit($lichHoc);
    	return redirect()->route('danhSachLichHoc',['maNganh' => $maNganh]);
    }

}
