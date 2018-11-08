<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaiKhoan extends Model
{
    static function kiemTraTonTai($user)
    {
        DB::select('select * from tai_khoan where ten_tai_khoan = ?');
    }

	static function register($user)
	{
		DB::insert('insert into tai_khoan(ten_giao_vu,ten_tai_khoan,mat_khau) value(?,?,?)',
            [$user->ten_giao_vu,$user->ten_tai_khoan,$user->mat_khau]);
	}

    static function login($user)
    {
    	$arr = DB::select('select * from tai_khoan where ten_tai_khoan = ? and mat_khau = ?',
                    [$user->ten_tai_khoan,$user->mat_khau]);
        $count = count($arr);
    	return $count;
    }

    static function getByUserName($userName)
    {
        $arr = DB::select('select * from tai_khoan where ten_tai_khoan = ?',[$userName]);
        return $arr[0];
    }
}
