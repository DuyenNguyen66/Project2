<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use DB;

class TaiKhoanCtrl extends Controller
{
	public function dangKy()
	{
		return view('tai_khoan.register');
	}

    public function dangKyXuLy(Request $request)
    {
    	$user = new TaiKhoan();
    	$user->ten_giao_vu = $request->txtHoTen;
    	$user->ten_tai_khoan = $request->txtTaiKhoan;
    	$user->mat_khau = md5($request->txtMatKhau);
        $count = TaiKhoan::login($user);
        if($count == 0)
        {
        	TaiKhoan::register($user);
        	return redirect()->route('login')->with('success_register','Đăng ký tài khoản thành công.');
        }else
        {
            return redirect()->route('register')->with('error_register','Tài khoản đã tồn tại. Vui lòng thử lại.');
        }
    }

    public function dangNhap()
	{
		return view('tai_khoan.login');
	}

    public function dangNhapXuLy(Request $request)
    {
    	$user = new TaiKhoan();
    	$user->ten_tai_khoan = $request->txtTaiKhoan;
    	$user->mat_khau = md5($request->txtMatKhau);
    	$count = TaiKhoan::login($user);
    	if($count > 0)
    	{
    		session()->put('user',$user->ten_tai_khoan);
            return redirect()->route('danhSachNganh');
    	}else
    	{
    		return redirect()->route('login')->with('Error','Đăng nhập thất bại. Vui lòng thử lại.');
    	}
    }

    public function dangXuat()
    {
    	if(session()->has('user'))
    	{
    		session()->flush();
            return redirect()->route('login')
                            ->with('SuccessLogout','Đăng xuất thành công.');
    	}
    }

    public function hienThiTaiKhoan()
    {
        if(session()->has('user'))
        {           
            $userName = session()->get('user');
            $obj = new TaiKhoan();
            $obj = TaiKhoan::getByUserName($userName);
            return view('tai_khoan.thong_tin_tai_khoan',['taiKhoan' => $obj]);
        }        
    }

    public function quenMatKhau()
    {
        return view('tai_khoan.quen_mat_khau');
    }

    public function quenMatKhauXuLy(Request $rq)
    {
        $obj = DB::select('select * from tai_khoan where ten_giao_vu = ?',[$rq->hoTen]);
        return $obj->mat_khau;
    }
}
