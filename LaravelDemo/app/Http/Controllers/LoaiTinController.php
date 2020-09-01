<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
      $loaitin = LoaiTin::all();
      return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem()
      {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
      }
    public function postThem(Request $request)
      {
        $this->validate($request,
            ['Ten'=>'required|min:3|max:100',
              'TheLoai'=>'required'],
            ['Ten.required'=>'Bạn chưa nhập tên loại tin',
             'Ten.min'=>'Bạn phải nhập tên có độ dài 3 đến 100 ký tự',
             'Ten.max'=>'Bạn phải nhập tên có độ dài 3 đến 100 ký tự',
              'TheLoai.required'=>'bạn hãy chọn thể loại',
             ]);
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('thongbao','thêm thành công');
    }
    public function getSua($id)
    {
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request, $id)
    {
         $loaitin = LoaiTin::find($id);
         $this->validate($request,
            ['Ten'=>'required|min:3|max:100',
              'TheLoai'=>'required'],
            ['Ten.required'=>'Bạn chưa nhập tên loại tin',
             'Ten.min'=>'Bạn phải nhập tên có độ dài 3 đến 100 ký tự',
             'Ten.max'=>'Bạn phải nhập tên có độ dài 3 đến 100 ký tự',
              'TheLoai.required'=>'bạn hãy chọn thể loại',
             ]);
         $loaitin->Ten = $request->Ten;
         $loaitin->TenKhongDau = changeTitle($request->Ten);
         $loaitin->idTheLoai = $request->TheLoai;
         $loaitin->save();
         return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','bạn đã xóa thành công');
    }
}
