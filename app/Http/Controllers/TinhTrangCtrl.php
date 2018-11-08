<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinhTrangPhatSach;
use App\NganhHoc;
use App\LichHoc;
use App\LopHoc;
use App\MonHoc;
use App\SinhVien;
use DB;

class TinhTrangCtrl extends Controller
{
    public function hienThiDanhSach($maLich,$maLop,$maMon)
    {       
        $objLich = LichHoc::getById($maLich);
        $objMon = MonHoc::getById($maMon);
        $objLop = LopHoc::getById($maLop);

        //kiểm tra bảng tình trạng có dữ liệu ?
        $arr = TinhTrangPhatSach::getAll($maLich);
        $soBanGhi = count($arr);
        if($soBanGhi > 0)
        {
        	return view('tinh_trang_phat_sach.tinh_trang',['danhSachSinhVien' => $arr,'lichHoc' => $objLich,'monHoc' => $objMon,'lopHoc' => $objLop]);
        }
        else
        {          
            //lấy ds sinh viên đã có theo mã lớp
            $arrSv = array();
            $arrSv = SinhVien::getByMaLichAndMaLop($maLich,$maLop);
            //đếm số sinh viên rồi insert từng sv vào bảng tình trạng
            $soSinhVien = count($arrSv);
            $i = 0;
            while ($i < $soSinhVien) 
            {
                TinhTrangPhatSach::insertSinhVien($objLich,$arrSv,$i);
                $i++;
            }         
            $arr1 = TinhTrangPhatSach::getAll($maLich);  
            return view('tinh_trang_phat_sach.tinh_trang',['danhSachSinhVien' => $arr1,'lichHoc' => $maLich,'monHoc' => $objMon
                        ,'lopHoc' => $objLop]);
        }
    }
    
    public function updateTT(Request $rq)
    {
        DB::update('update tinh_trang_phat_sach set tinh_trang = ? where ma_sinh_vien = ? and ma_lich_hoc = ?',
                    [$rq->tinhTrang,$rq->maSv,$rq->maLich]);
    }

    public function hienThi($maNganh)
    {
        $obj = NganhHoc::getById($maNganh);
        $arrLop = LichHoc::getLopByMaNganh($maNganh);
        return view('tinh_trang_phat_sach.thong_ke_so_luong',['nganhHoc' => $obj,'danhSachLop' => $arrLop]);
    }

    //hiện select box của môn học
    public function getMonByMaLop(Request $rq)
    {
        $maLop = $rq->maLop;
        $arrMon = TinhTrangPhatSach::getMonByMaLop($maLop);
        return view('tinh_trang_phat_sach.select_mon',['danhSachMon' => $arrMon]);
    }
//
    public function thongKeSoLuong(Request $rq)
    {
        $maLop = $rq->maLop;
        $maMon = $rq->maMon;
        $arr = TinhTrangPhatSach::tinhSoLuong($maLop,$maMon);
        return view('tinh_trang_phat_sach.bang_thong_ke',['danhSachThongKe' => $arr]);
    }

}

