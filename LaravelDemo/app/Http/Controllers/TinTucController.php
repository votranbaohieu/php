<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {   
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem()
    {
        return view('admin.tintuc.them');
    }
    public function getSua()
    {
        return view('admin.tintuc.sua');
    }
}

