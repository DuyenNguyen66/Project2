<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TinhTrangPhatSach extends Model
{
	//insert danh sách sinh viên vào bảng tình trạng 
    static function insertSinhVien($objLich,$arrSv,$i)
    {
        DB::insert('insert into tinh_trang_phat_sach (ma_lich_hoc,ma_sinh_vien,tinh_trang) values(?,?,?)',
                    [$objLich->ma_lich_hoc,$arrSv[$i]->ma_sinh_vien,0]);
    }

    //lấy bảng tình trạng
    static function getAll($maLich)
    {
        $arr = DB::select('select * from tinh_trang_phat_sach 
                                             inner join lich_hoc on tinh_trang_phat_sach.ma_lich_hoc = lich_hoc.ma_lich_hoc
                                             inner join sinh_vien on tinh_trang_phat_sach.ma_sinh_vien = sinh_vien.ma_sinh_vien
                            where lich_hoc.ma_lich_hoc = ?',[$maLich]);
        return $arr;
    }

    //lấy môn học theo mã lớp tương ứng
    static function getMonByMaLop($maLop)
    {
        $arr = DB::select('select * from lich_hoc
                                        inner join mon_hoc on lich_hoc.ma_mon_hoc = mon_hoc.ma_mon_hoc
                                        where lich_hoc.ma_lop_hoc = ?',[$maLop]);
        return $arr;
    }

    //thống kê số lượng
    static function tinhSoLuong($maLop,$maMon)
    {
        $arr = DB::select('select tinh_trang_phat_sach.tinh_trang, count(*) as so_luong
                            from tinh_trang_phat_sach 
                                                inner join lich_hoc on tinh_trang_phat_sach.ma_lich_hoc = lich_hoc.ma_lich_hoc
                                                inner join lop_hoc on lich_hoc.ma_lop_hoc = lop_hoc.ma_lop_hoc
                                                inner join mon_hoc on lich_hoc.ma_mon_hoc = mon_hoc.ma_mon_hoc
                            where lop_hoc.ma_lop_hoc = ? and mon_hoc.ma_mon_hoc = ?                    
                            group by tinh_trang_phat_sach.tinh_trang',[$maLop,$maMon]);
        return $arr;
    }
}