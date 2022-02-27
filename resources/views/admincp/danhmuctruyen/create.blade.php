@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-header"><h4>Thêm danh mục</h4></div>
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
                    <form method="POST" action="{{route('danhmuc.store')}}">
                     @csrf
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tên danh mục</label>
                        <input name="tendanhmuc" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug();" type="text" class="form-control" id="slug" placeholder="Nhập tên danh mục">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input name="slug_danhmuc" value="{{old('slug_danhmuc')}}" type="text" class="form-control" id="convert_slug" placeholder="Nhập Slug danh mục">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                        <input name="mota" value="{{old('mota')}}" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                       <select name="kichhoat" class="form-control" id="exampleFormControlSelect1">
                          <option value="0">Hoạt động</option>
                          <option value="1">Ẩn</option>
                        
                        </select>
                    </div>
                     
                      <button name="themdanhmuc" type="submit" class="btn btn-primary">Thêm danh mục mới</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
