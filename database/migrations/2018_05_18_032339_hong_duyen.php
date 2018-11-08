<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HongDuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nganh_hoc', function($table){
            $table->Increments('ma_nganh_hoc');
            $table->string('ten_viet_tat_nganh',10);
            $table->string('ten_nganh_hoc',50)->collation('utf8mb4_general_ci');
        });
        Schema::create('mon_hoc', function($table){
            $table->Increments('ma_mon_hoc');
            $table->string('ten_viet_tat_mon',10);
            $table->string('ten_mon_hoc',50)->collation('utf8mb4_general_ci');
            $table->Integer('ma_nganh_hoc')->unsigned();
            $table->foreign('ma_nganh_hoc')->references('ma_nganh_hoc')->on('nganh_hoc');
        });
        Schema::create('lop_hoc', function($table){
            $table->Increments('ma_lop_hoc');
            $table->string('ten_viet_tat_lop',10);
            $table->string('ten_lop_hoc',50)->collation('utf8mb4_general_ci');
            $table->Integer('ma_nganh_hoc')->unsigned();
            $table->foreign('ma_nganh_hoc')->references('ma_nganh_hoc')->on('nganh_hoc');
        });
        Schema::create('lich_hoc', function($table){
            $table->Increments('ma_lich_hoc');
            $table->Integer('ma_lop_hoc')->unsigned();
            $table->foreign('ma_lop_hoc')->references('ma_lop_hoc')->on('lop_hoc');
            $table->Integer('ma_mon_hoc')->unsigned();
            $table->foreign('ma_mon_hoc')->references('ma_mon_hoc')->on('mon_hoc');
            $table->date('ngay_bat_dau');
        });
        Schema::create('sinh_vien', function($table){
            $table->string('ma_sinh_vien',10);
            $table->primary('ma_sinh_vien');
            $table->string('ten_sinh_vien',200)->collation('utf8mb4_general_ci');
            $table->date('ngay_sinh');
            $table->string('email')->unique();
            $table->Integer('ma_lop_hoc')->unsigned();
            $table->foreign('ma_lop_hoc')->references('ma_lop_hoc')->on('lop_hoc');
        });
        Schema::create('tinh_trang_phat_sach', function($table){
            $table->Increments('ma_tinh_trang');
            $table->Integer('ma_lich_hoc')->unsigned();
            $table->foreign('ma_lich_hoc')->references('ma_lich_hoc')->on('lich_hoc');
            $table->string('ma_sinh_vien');
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_vien');
            $table->tinyInteger('tinh_trang')->unsigned();
        });
        Schema::create('tai_khoan', function($table){
            $table->Increments('ma_tai_khoan');
            $table->string('ten_giao_vu',200)->collation('utf8mb4_general_ci');
            $table->string('ten_tai_khoan',100)->unique();
            $table->string('mat_khau',50)->unique();
        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tai_khoan');
        Schema::dropIfExists('tinh_trang_phat_sach');
        Schema::dropIfExists('sinh_vien');
        Schema::dropIfExists('lich_hoc');
        Schema::dropIfExists('lop_hoc');
        Schema::dropIfExists('mon_hoc');
        Schema::dropIfExists('nganh_hoc');
    }
}