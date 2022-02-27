@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header"><h4>Liệt kê các sách</h4></div>
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
                    <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tên sách</th>
                              <th scope="col">Hình ảnh</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Tóm tắt</th>
                              <th scope="col">Danh mục</th>
                              <th scope="col">Thể loại</th>
                              <th scope="col">Trạng thái</th>
                              <th scope="col">Mục nổi bật</th>
                              <th scope="col">Ngày tạo</th>
                              <th scope="col">Thao tác</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($list_truyen as $key => $truyen)
                            <tr>
                              <th scope="row">{{$key}}</th>
                              <td>{{$truyen -> tentruyen}}</td>
                              <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="100" ></td>
                              <td>{{$truyen -> slug_truyen}}</td>
                              <td>{{Illuminate\Support\Str::of($truyen -> tomtat)->words(20)}}</td>
                              <td>{{$truyen -> danhmuctruyen->tendanhmuc}}</td>
                              <td>{{$truyen -> theloai->tentheloai}}</td>
                              <td>
                                  @if ($truyen -> kichhoat ==0)
                                    <span class="text text-success">Hoạt động</span>
                                  @else
                                    <span class="text text-danger">Ẩn</span>
                                  @endif
                              </td>
                              <td width="12%">
                                @if ($truyen -> truyen_noibat == 0)
                                <form>
                                    @csrf
                                    <select name="truyennoibat" data-truyen_id="{{$truyen ->id}}" class="form-control truyennoibat">
                                        <option selected value="0">Mục mới đăng</option>
                                        <option value="1">Mục nổi bật</option>
                                    </select>
                                </form>
                                                           
                                @else
                                <form>
                                    @csrf
                                    <select name="truyennoibat" data-truyen_id="{{$truyen ->id}}" class="form-control truyennoibat">
                                        <option value="0">Mục mới đăng</option>
                                        <option selected value="1">Mục nổi bật</option>
                                    </select>
                                </form>
                                @endif
                              </td>
                              <td>{{$truyen -> created_at}}</td>
                              <td>
                               <p> <a href="{{route('truyen.edit',[$truyen -> id])}}" class="btn btn-success">Sửa</a></p>
                                  <form action="{{route('truyen.destroy',[$truyen -> id])}} "method='post'>
                                    @method('delete')
                                    @csrf

                                    <button onclick="return confirm ('Bạn muốn xóa sách này')"; class="btn btn-danger">Xóa</button>
                                      
                                  </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
