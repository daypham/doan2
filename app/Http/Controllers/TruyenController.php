<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use Carbon\Carbon;
use App\Models\Truyen;
use App\Models\Theloai;
use Illuminate\Support\Str;


class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $list_truyen = truyen::with('danhmuctruyen','theloai')->orderBy('id','DESC')->get();
        return view ('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view ('admincp.truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'slug_truyen' => 'required|unique:truyen|max:255',
                'tomtat' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'kichhoat' => 'required',
                'tacgia' => 'required',
                'theloai' => 'required',
                'truyennoibat' => 'required',
                'danhmuc' => 'required',
            ],
            [   
                'slug_truyen.unique' => 'Slug đã tồn tại!',
                'tentruyen.required' => 'Tên sách không được bỏ trống!',
                     'tacgia.required' => 'Tên tác giả không được bỏ trống!',
                'tentruyen.unique' => 'Tên sách đã tồn tại!',
                'tomtat.required' => 'Tóm tắt không được bỏ trống!',
                'hinhanh.required' => 'Chưa chọn hình ảnh!',
            ]
        );

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->theloai_id= $data['theloai'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->truyen_noibat = $data['truyennoibat'];

        $truyen ->created_at = Carbon::now('Asia/Ho_Chi_Minh');


        $get_image = $request ->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image -> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image-> getClientOriginalExtension();
        $get_image -> move ($path,$new_image);
        $truyen -> hinhanh = $new_image;


        $truyen -> save();
        return redirect()->back()->with('status','Đã thêm thành công sách mới!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $truyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view ('admincp.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request ->validate(
            [
                'tentruyen' => 'required|max:255',
                'slug_truyen' => 'required|max:255',
                'tomtat' => 'required',
                'kichhoat' => 'required',
                'truyennoibat' => 'required',
                'danhmuc' => 'required',
                'tacgia' => 'required',
                'theloai' => 'required',
            ],
            [   
                'tentruyen.required' => 'Tên sách không được bỏ trống!',
                'tentruyen.unique' => 'Tên sách đã tồn tại!',
                'tomtat.required' => 'Tóm tắt không được bỏ trống!',
               'tacgia.required' => 'Tác giả không được bỏ trống!',

            ]
        );

        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen ->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request ->hinhanh;
        if($get_image){
            $path = 'public/uploads/truyen/'.$truyen ->hinhanh;
        if (file_exists($path)){
            unlink($path);
        }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image -> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image-> getClientOriginalExtension();
            $get_image -> move ($path,$new_image);
            $truyen -> hinhanh = $new_image;
        }

        $truyen -> save();
        return redirect()->back()->with('status','Cập nhật thành công sách mới!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen =Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen ->hinhanh;
        if (file_exists($path)){
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Bạn vừa xóa thành công!');

    }
    public function truyennoibat (Request $request){
        $data = $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->save();
    }
}
