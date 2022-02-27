@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header"><h4>Thêm Sách Truyện</h4></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tên Sách</label>
                        <input name="tentruyen" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug();" type="text" class="form-control" id="slug" placeholder="Nhập tên sách">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tác giả</label>
                        <input name="tacgia" value="{{old('tacgia')}}"  type="text" class="form-control"  placeholder="Nhập tên tác giả">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input name="slug_truyen" value="{{old('slug_danhmuc')}}" type="text" class="form-control" id="convert_slug" placeholder="Nhập Slug sách">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt</label>
                        <textarea class="form-control" name="tomtat" rows="5" style="resize: none;"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                       <select name="danhmuc" class="form-control" id="exampleFormControlSelect1">
                          @foreach ($danhmuc as $key => $muc)
                          <option value="{{$muc -> id}}">{{$muc -> tendanhmuc}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại</label>
                       <select name="theloai" class="form-control" id="exampleFormControlSelect1">
                          @foreach ($theloai as $key => $the)
                          <option value="{{$the -> id}}">{{$the -> tentheloai}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Hình ảnh</label>
                        <input name="hinhanh"  type="file" class="form-control-file">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                       <select name="kichhoat" class="form-control" id="exampleFormControlSelect1">
                          <option value="0">Hoạt động</option>
                          <option value="1">Ẩn</option>
                        
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Truyện nổi bật</label>
                       <select name="truyennoibat" class="form-control" id="exampleFormControlSelect1">
                          <option value="0">Mục mới đăng</option>
                          <option value="1">Mục nổi bật</option>
                        </select>
                    </div>
                     
                      <button name="themtruyen" type="submit" class="btn btn-primary">Thêm nội dung mới</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
