<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class NganhHoc extends Model
{
    public function getAll()
    {
        $arr = DB::select('select * from nganh_hoc');
        return $arr;
    }

    public function getById($id)
    {
        $arr = DB::select('select * from nganh_hoc where ma_nganh_hoc = ?', [$id]);
        return $arr[0];
    }

    public function kiemTraTonTai($nganhHoc)
    {
        $arr = DB::select(
            'select * from nganh_hoc where ten_viet_tat_nganh = ? or ten_nganh_hoc = ?',
            [$nganhHoc->ten_viet_tat_nganh, $nganhHoc->ten_nganh_hoc]
        );
        return count($arr);
    }

    public function insert($nganhHoc)
    {
        DB::insert(
            'insert into nganh_hoc(ten_viet_tat_nganh,ten_nganh_hoc) value (?,?)',
            [$nganhHoc->ten_viet_tat_nganh, $nganhHoc->ten_nganh_hoc]
        );
    }

    public function edit($nganhHoc)
    {
        DB::update(
            'update nganh_hoc set ten_viet_tat_nganh = ?, ten_nganh_hoc = ? where ma_nganh_hoc = ?',
            [$nganhHoc->ten_viet_tat_nganh, $nganhHoc->ten_nganh_hoc, $nganhHoc->ma_nganh_hoc]
        );
    }
}
