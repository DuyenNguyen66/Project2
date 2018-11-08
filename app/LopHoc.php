<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LopHoc extends Model
{
   static function getAll()
    {
    	$arr = DB::select('select nganh_hoc.ma_nganh_hoc,nganh_hoc.ten_nganh_hoc
                                    ,lop_hoc.ma_lop_hoc,lop_hoc.ten_viet_tat_lop,lop_hoc.ten_lop_hoc
            from lop_hoc inner join nganh_hoc on lop_hoc.ma_nganh_hoc = nganh_hoc.ma_nganh_hoc');
    	return $arr;
    }

    static function getById($id)
    {
    	$obj = DB::select('select * from lop_hoc where ma_lop_hoc = ?',[$id]);
    	return $obj[0];
    }

    static function kiemTraTonTai($lopHoc)
    {
        $arr = DB::select('select * from lop_hoc where ten_viet_tat_lop = ? or ten_lop_hoc = ?',
                    [$lopHoc->ten_viet_tat_lop,$lopHoc->ten_lop_hoc]);
        return count($arr);
    }

    static function insert($lopHoc)
    {
    	DB::insert('insert into lop_hoc(ten_viet_tat_lop,ten_lop_hoc,ma_nganh_hoc) value (?,?,?)',
    				[$lopHoc->ten_viet_tat_lop,$lopHoc->ten_lop_hoc,$lopHoc->ma_nganh_hoc]);
    }

    static function edit($lopHoc)
    {
    	DB::update('update lop_hoc set ten_viet_tat_lop = ?, ten_lop_hoc = ?, ma_nganh_hoc = ? where ma_lop_hoc = ?',
    				[$lopHoc->ten_viet_tat_lop,$lopHoc->ten_lop_hoc,$lopHoc->ma_nganh_hoc,$lopHoc->ma_lop_hoc]);
    }

}
?>