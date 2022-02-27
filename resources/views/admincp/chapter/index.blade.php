@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12  mt-2">
            <div class="card">
                <div class="card-header"><h4>Liệt kê các Chương</h4></div>
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
                              <th scope="col">Tên Chương</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Tóm tắt</th>
                              <th scope="col">Thuộc sách</th>
                              <th scope="col">Trạng thái</th>
                              <th scope="col">Thao tác</th>
                            </tr>
                          </thead>

                          <tbody>
                            @foreach ($chapter as $key => $chap)
                            <tr>
                              <th scope="row">{{$key}}</th>
                              <td>{{$chap -> tieude}}</td>
                             
                              <td>{{$chap -> slug_chapter}}</td>
                              <td>{{$chap -> tomtat}}</td>
                              <td>{{$chap -> truyen-> tentruyen}}</td>
                              <td>
                                  @if ($chap -> kichhoat ==0)
                                    <span class="text text-success">Hoạt động</span>
                                  @else
                                    <span class="text text-danger">Ẩn</span>
                                  @endif
                              </td>
                              <td>
                                <p><a href="{{route('chapter.edit',[$chap -> id])}}" class="btn btn-success">Sửa</a></p>
                                  <form action="{{route('chapter.destroy',[$chap -> id])}} "method='post'>
                                    @method('delete')
                                    @csrf

                                    <button onclick="return confirm ('Bạn muốn xóa Chương này không?')"; class="btn btn-danger">Xóa</button>
                                      
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
