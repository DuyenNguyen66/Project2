<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SinhVien extends Model
{
    //insert file excel
    public $table = "sinh_vien";
    protected $fillable = ['ma_sinh_vien','ten_sinh_vien','ngay_sinh','email','ma_lop_hoc'];

    //bảng ds sinh viên
    static function getByMaLop($maLop)
    {
        $arr = DB::select('select * from sinh_vien where ma_lop_hoc = ?',[$maLop]);
        return $arr;
    }

    //bảng tình trạng
    static function getByMaLichAndMaLop($maLich,$maLop)
    {
    	$arr = DB::select('select * from sinh_vien 
                                            inner join lop_hoc on sinh_vien.ma_lop_hoc = lop_hoc.ma_lop_hoc
                                            inner join lich_hoc on lop_hoc.ma_lop_hoc = lich_hoc.ma_lop_hoc
                            where lich_hoc.ma_lich_hoc = ? and lop_hoc.ma_lop_hoc = ? ',[$maLich,$maLop]);
    	return $arr;
    }

    // static function edit($sinhVien)
    // {
    // 	DB::update('update sinh_vien set ten_sinh_vien = ?, ngay_sinh = ?, email = ?, ma_lop_hoc = ? where ma_sinh_vien = ?',
    // 				[$sinhVien->ten_sinh_vien,$sinhVien->ngay_sinh,$sinhVien->email,$sinhVien->ma_lop_hoc,$sinhVien->ma_sinh_vien]);
    // }

}
