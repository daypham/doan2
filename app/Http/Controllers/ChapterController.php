<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;



class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();

        return view ('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view ('admincp.chapter.create')->with(compact('truyen'));
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
                'tieude' => 'required|unique:chapter|max:255',
                'slug_chapter' => 'required|unique:chapter|max:255',
                'tomtat' => 'required|max:255',
              'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ],
            [   
                'slug_chapter.unique' => 'Slug đã tồn tại!',
                'tieude.required' => 'Tên chương không được bỏ trống!',
                'tieude.unique' => 'Tên chương đã tồn tại!',
                'noidung.required' => 'Nội dung không được bỏ trống!',
                'tomtat.required' => 'Tóm tắt không được bỏ trống!',
            ]
        );

        $chapter = new Chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->noidung = $data['noidung'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter -> save();
        return redirect()->back()->with('status','Đã thêm thành công chương mới!');

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
         $chapter = Chapter::find($id);

        $truyen = Truyen::orderBy('id','DESC')->get();

        return view ('admincp.chapter.edit')->with(compact('truyen','chapter'));
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
                'tieude' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'tomtat' => 'required|max:255',
              'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ],
            [   
                'slug_chapter.unique' => 'Slug đã tồn tại!',
                'tieude.required' => 'Tên chương không được bỏ trống!',
                'tieude.unique' => 'Tên chương đã tồn tại!',
                'noidung.required' => 'Nội dung không được bỏ trống!',
                'tomtat.required' => 'Tóm tắt không được bỏ trống!',
            ]
        );

        $chapter =  Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->noidung = $data['noidung'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter -> save();
        return redirect()->back()->with('status','Cập nhật thành công!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa thành công!');

    }
}
