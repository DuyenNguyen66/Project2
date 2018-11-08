<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MonHoc extends Model
{
    static function getAll()
    {
    	$arr = DB::select('select nganh_hoc.ma_nganh_hoc,nganh_hoc.ten_nganh_hoc
                                    ,mon_hoc.ma_mon_hoc,mon_hoc.ten_viet_tat_mon,mon_hoc.ten_mon_hoc
                        from mon_hoc inner join nganh_hoc on mon_hoc.ma_nganh_hoc = nganh_hoc.ma_nganh_hoc');
    	return $arr;
    }

    static function getById($id)
    {
    	$obj = DB::select('select * from mon_hoc where ma_mon_hoc = ? ',[$id]);
    	return $obj[0];
    }

    static function kiemTraTonTai($monHoc)
    {
        $arr = DB::select('select * from mon_hoc where ten_viet_tat_mon = ? or ten_mon_hoc = ?',
                    [$monHoc->ten_viet_tat_mon,$monHoc->ten_mon_hoc]);
        return count($arr);
    }

    static function insert($monHoc)
    {
    	DB::insert('insert into mon_hoc(ten_viet_tat_mon,ten_mon_hoc,ma_nganh_hoc) value (?,?,?)',
    				[$monHoc->ten_viet_tat_mon,$monHoc->ten_mon_hoc,$monHoc->ma_nganh_hoc]);
    }

    static function edit($monHoc)
    {
    	DB::update('update mon_hoc set ten_viet_tat_mon = ?, ten_mon_hoc = ?, ma_nganh_hoc = ? where ma_mon_hoc = ?',
    				[$monHoc->ten_viet_tat_mon,$monHoc->ten_mon_hoc,$monHoc->ma_nganh_hoc,$monHoc->ma_mon_hoc]);
    }

}
