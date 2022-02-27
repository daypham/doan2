@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Chỉnh sửa danh mục</h4></div>
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
                    <form method="POST" action="{{route('danhmuc.update',[$danhmuc -> id])}}">
                     @csrf
                     @method ('PUT')
                      <div class="form-group">
                        <label for="exampleInputPassword1">Tên danh mục</label>
                        <input name="tendanhmuc" type="text" class="form-control"  onkeyup="ChangeToSlug();" value="{{$danhmuc -> tendanhmuc}}" id="slug" placeholder="Nhập tên danh mục">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input name="slug_danhmuc" type="text" class="form-control" value="{{$danhmuc -> slug_danhmuc}}" id="convert_slug" placeholder="Nhập slug danh mục">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                        <input name="mota" type="text" class="form-control" id="exampleInputPassword1" value="{{$danhmuc -> mota}}" placeholder="Nhập mô tả">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái</label>
                       <select name="kichhoat" class="form-control" id="exampleFormControlSelect1">
                       	@if ($danhmuc -> kichhoat==0)
                          <option selected value="0">Hoạt động</option>
                          <option value="1">Ẩn</option>
                        @else
                        <option  value="0">Hoạt động</option>
                          <option selected value="1">Ẩn</option>
                          @endif
                        </select>
                    </div>
                     
                      <button name="themdanhmuc" type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
