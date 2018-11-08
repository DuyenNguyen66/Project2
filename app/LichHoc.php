<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LichHoc extends Model
{
    static function getByMaNganh($id) //lấy danh sách lịch học thuộc ngành đã chọn -> hiển thị dsach
    {
    	$arr = DB::select('select lop_hoc.ma_lop_hoc,lop_hoc.ten_viet_tat_lop,lop_hoc.ten_lop_hoc
                                    ,mon_hoc.ma_mon_hoc,mon_hoc.ten_viet_tat_mon,mon_hoc.ten_mon_hoc
                                    ,lich_hoc.ma_lich_hoc,lich_hoc.ngay_bat_dau
                                    ,(ADDDATE(lich_hoc.ngay_bat_dau,14)) as thoi_han
                            from (((lich_hoc
                                     inner join lop_hoc on lich_hoc.ma_lop_hoc = lop_hoc.ma_lop_hoc)
                                     inner join mon_hoc on lich_hoc.ma_mon_hoc = mon_hoc.ma_mon_hoc)
                                     inner join nganh_hoc on mon_hoc.ma_nganh_hoc = nganh_hoc.ma_nganh_hoc)
                            where nganh_hoc.ma_nganh_hoc = ?',[$id]);
    	return $arr;
    }

    static function getLopByMaNganh($id) //lấy danh sách lớp thuộc ngành đã chọn -> hiển thị trong select box
    {
        $arrLop = DB::select('select * from lop_hoc where ma_nganh_hoc = ?',[$id]);
        return $arrLop;
    }

    static function getMonByMaNganh($id)
    {
        $arrMon = DB::select('select * from mon_hoc where ma_nganh_hoc = ?',[$id]);
        return $arrMon;
    }

    static function getById($id)
    {
    	$arr = DB::select('select * from lich_hoc inner join lop_hoc on lich_hoc.ma_lop_hoc = lop_hoc.ma_lop_hoc 
                                        where ma_lich_hoc = ?',[$id]);
    	return $arr[0];
    }

    static function insert($lichHoc)
    {
    	DB::insert('insert into lich_hoc(ma_lop_hoc,ma_mon_hoc,ngay_bat_dau) value (?,?,?)',
    				[$lichHoc->ma_lop_hoc,$lichHoc->ma_mon_hoc,$lichHoc->ngay_bat_dau]);
    }

    static function edit($lichHoc)
    {
    	DB::update('update lich_hoc set ma_mon_hoc = ?, ngay_bat_dau = ? where ma_lich_hoc = ?',
    				[$lichHoc->ma_mon_hoc,$lichHoc->ngay_bat_dau,$lichHoc->ma_lich_hoc]);
    }

}
