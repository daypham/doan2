<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Theloai;
use App\Models\Chapter;
use Illuminate\Support\Str;
class IndexController extends Controller
{
    public function home (){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->paginate(12);
        $truyenmoidang = Truyen::orderBy('id','DESC')->where('truyen_noibat',0) -> take(10)->get();
        $truyennoibat = Truyen::orderBy('id','DESC')->where('truyen_noibat',1) -> take(10)->get();

        return view ('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen','truyenmoidang','truyennoibat'));
    }
    public function danhmuc($slug) {
        $theloai = Theloai::orderBy('id','DESC')->get();

        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();
        $tendanhmuc = $danhmuc_id ->tendanhmuc;
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view ('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','theloai','slide_truyen'));
    }

    public function theloai($slug) {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $theloai_id = Theloai::where('slug_theloai',$slug)->first();
        $tentheloai = $theloai_id ->tentheloai;

        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();
        return view ('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai','slide_truyen'));
    }

      
      public function xemtruyen($slug) {
        $theloai = Theloai::orderBy('id','DESC')->get();

        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();   
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen ->id)->get();

         $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen ->id)->first();

         $chapter_cuoi = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen ->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen -> danhmuctruyen -> id)->whereNotIn('id',[$truyen->id])->get();

        $truyenmoidang = Truyen::orderBy('id','DESC')->where('truyen_noibat',0) -> take(10)->get();
        $truyennoibat = Truyen::orderBy('id','DESC')->where('truyen_noibat',1) -> take(10)->get();

        return view ('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen','chapter_cuoi','truyenmoidang','truyennoibat'));
    }
   
    public function xemchapter($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen = Chapter::where('slug_chapter',$slug)->first();

        //Đường dẫn Breadcrumb
        $duongdan = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        //Đường dẫn Breadcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen ->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen ->truyen_id)->get();

        $tapsau = Chapter::where('truyen_id',$truyen -> truyen_id) ->where('id','>',$chapter -> id)-> min('slug_chapter');

        $taptruoc = Chapter::where('truyen_id',$truyen -> truyen_id) ->where('id','<',$chapter -> id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen -> truyen_id)->orderBy('id','DESC')->first();

        $min_id = Chapter::where('truyen_id',$truyen -> truyen_id)->orderBy('id','ASC')->first();

        return view ('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','taptruoc','tapsau','max_id','min_id','theloai','duongdan','slide_truyen'));
    }
    public function timkiem(){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $tukhoa = $_GET['tukhoa'];

        $theloai = Theloai::orderBy('id','DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        $truyen =Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->Orwhere('tacgia','LIKE','%'.$tukhoa.'%')->get();

        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa'));
    }
}
