@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Chỉnh sửa Sách Truyện</h4></div>
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
                    <form method="POST" action="{{route('truyen.update',[$truyen -> id])}}" enctype="multipart/form-data">
                     @csrf
                     @method ('PUT')
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tên Sách</label>
                        <input name="tentruyen" value="{{$truyen -> tentruyen}}" onkeyup="ChangeToSlug();" type="text" class="form-control" id="slug" placeholder="Nhập tên sách">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tác giả</label>
                        <input name="tacgia" value="{{$truyen -> tacgia}}" type="text" class="form-control" placeholder="Nhập tên tác giả">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input name="slug_truyen" value="{{$truyen -> slug_truyen}}" type="text" class="form-control" id="convert_slug" placeholder="Nhập Slug sách">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt</label>
                        <textarea class="form-control"  name="tomtat" rows="5" style="resize: none;">{{$truyen -> tomtat}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục</label>
                       <select name="danhmuc" class="form-control" id="exampleFormControlSelect1">
                          @foreach ($danhmuc as $key => $muc)
                          <option {{ $muc -> id == $truyen ->danhmuc_id ? 'selected' : ''}} value="{{$muc -> id}}">{{$muc -> tendanhmuc}}</option>
                        @endforeach
                        </select>
                    </div>

                     <div class="form-group">
                        <label for="exampleInputPassword1">Thể loại</label>
                       <select name="theloai" class="form-control" id="exampleFormControlSelect1">
                          @foreach ($theloai as $key => $the)
                          <option {{ $the -> id == $truyen ->theloai_id ? 'selected' : ''}} value="{{$the -> id}}">{{$the -> tentheloai}}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Hình ảnh</label>
                        <input name="hinhanh"  type="file" class="form-control-file">
                        <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" width="200" height="200">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                       <select name="kichhoat" class="form-control" id="exampleFormControlSelect1">
                          	@if ($truyen -> kichhoat==0)
                          <option selected value="0">Hoạt động</option>
                          <option value="1">Ẩn</option>
                        @else
                        <option  value="0">Hoạt động</option>
                          <option selected value="1">Ẩn</option>
                          @endif
                        
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Sách nổi bật</label>
                       <select name="truyennoibat" class="form-control">
                        @if ($truyen -> truyen_noibat == 0)
                            <option selected value="0">Mục mới đăng</option>
                            <option value="1">Mục nổi bật</option>
                    
                        @else
                            <option value="0">Mục mới đăng</option>
                            <option selected value="1">Mục nổi bật</option>
                        @endif
                        </select>
                    </div>
                     
                      <button name="themtruyen" type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
