@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header"><h4>Thêm Số Chương</h4></div>
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
                    <form method="POST" action="{{route('chapter.store')}}" enctype="multipart/form-data">
                     @csrf
                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tên Chương</label>
                        <input name="tieude" value="{{old('tieude')}}" onkeyup="ChangeToSlug();" type="text" class="form-control" id="slug" placeholder="Nhập tên chương">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input name="slug_chapter" value="{{old('slug_chapter')}}" type="text" class="form-control" id="convert_slug" placeholder="Nhập Slug chương">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt chương</label>
                        <input name="tomtat" value="{{old('tomtat')}}" type="text" class="form-control" id="convert_slug" placeholder="Nhập tóm tắt">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                        <textarea class="form-control" id="noidung_chapter" name="noidung" rows="5" style="resize: none;">{{old('noidung')}}</textarea>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputPassword1">Thuộc Sách</label>
                       <select name="truyen_id" class="form-control" id="exampleFormControlSelect1">
                       		@foreach ($truyen as $key => $value)
                          <option value="{{$value -> id}}">{{$value -> tentruyen}}</option>
                        	@endforeach
                        </select>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                       <select name="kichhoat" class="form-control" id="exampleFormControlSelect1">
                          <option value="0">Hoạt động</option>
                          <option value="1">Ẩn</option>
                        
                        </select>
                    </div>
                     
                      <button name="themchuong" type="submit" class="btn btn-primary">Thêm chương mới</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
