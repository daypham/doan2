@extends ('../layout')

@section ('content')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url ('danh-muc/'.$truyen->danhmuctruyen -> slug_danhmuc)}}">{{$truyen -> danhmuctruyen -> tendanhmuc}}</a></li>
    <li class="breadcrumb-item"><a href="{{url ('the-loai/'.$truyen->theloai -> slug_theloai)}}">{{$truyen -> theloai -> tentheloai}}</a></li>
     <li class="breadcrumb-item active">{{$truyen -> tentruyen}}</li>

  </ol>
</nav>


<div class="row">
	<div class="col-md-9">
		<div class="row">
				<div class="col-md-3">
				 <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen -> hinhanh)}}">

				</div>
				<div class="col-md-9">
					<style type="text/css">
						.info{
							list-style: none;
						}
					</style>
					<ul class="info">
						<li><h5 class="font-weight-bold">{{$truyen -> tentruyen}}</h5></li>
						<li>Tác giả: {{$truyen -> tacgia}}</li>
						<li >Ngày đăng: {{$truyen -> created_at -> diffForHumans()}}</li>
						<li>Danh mục: <a href="{{url ('danh-muc/'.$truyen->danhmuctruyen -> slug_danhmuc)}}">{{$truyen -> danhmuctruyen -> tendanhmuc}}</a></li>
						<li>Thể loại: <a href="{{url ('the-loai/'.$truyen->theloai -> slug_theloai)}}">{{$truyen -> theloai -> tentheloai}}</a></li>
						<li>Số chương: 15</li>
						<li>Lượt xem: 102</li>
						<li class="py-1"><a class="xemmucluc" style="cursor: pointer;">Xem mục lục</a></li>
						@if ($chapter_dau)
							<li><a href="{{url('xem-chapter/'.$chapter_dau -> slug_chapter)}}" class="btn btn-primary">Đọc ngay</a></li>
							<li><a href="{{url('xem-chapter/'.$chapter_cuoi -> slug_chapter)}}" class="btn btn-success mt-1">Đọc chương mới nhất</a></li>

						@else
							<li><a class="btn btn-danger btn-small disabled">Chưa cập nhật</a></li>
						@endif
					</ul>
				</div>
					</div>

				
					<div class="col-md-12 mt-2">
	                      <div class="card mb-12 box-shadow">
	                        <div class="card-body">
	                         <p>{{$truyen -> tomtat}}</p>
	                        </div>
	                      </div>
	                    </div> 

				<hr>
				<h4 class="titlemucluc">Mục lục</h4>
					<ul class="mucluc">
						@php
							$demmucluc = count($chapter)
						@endphp
							@if ($demmucluc >0)
						@foreach ($chapter as $key => $chap)
						<li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap -> tieude}}</a></li>
						@endforeach
							@else
								<div class="col-md-12 my-2">
	                      <div class="card mb-12 box-shadow">
	                        <div class="card-body">
	                         Đang cập nhật
	                        </div>
	                      </div>
	                    </div> 
							@endif
					</ul>
					<h4>Sách cùng danh mục</h4>
					<div class="row">
						@php
							$demcungdanhmuc = count($cungdanhmuc)
						@endphp
							@if ($demcungdanhmuc >0)
						  @foreach ($cungdanhmuc as $key => $value)
                    <div class="col-md-3">
                      <div class="card mb-3 box-shadow">
	                       <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$value ->hinhanh)}}">
                        <div class="card-body">
                          <h5 class="font-weight-bold">{{$value -> tentruyen}}</h5>
                          <p class="card-text">{{Illuminate\Support\Str::of($value -> tomtat)->words(15)}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="{{url('xem-truyen/'.$value -> slug_truyen)}}" class="btn btn-secondary">Xem ngay</a>
                            </div>
                        </div>
                      </div>
                    </div> 
                  </div>
                    @endforeach
                  @else
										<div class="col-md-12">
	                      <div class="card mb-12 box-shadow">
	                        <div class="card-body">
	                         <p><h5>Không có sách cùng danh mục!</h5></p>
	                        </div>
	                      </div>
	                    </div> 
									@endif
                
					</div>
				</div>

				
			    <div class="col-md-3">
          <section class="card-box">
            <h4>Truyện nổi bật</h4>
            @foreach ($truyennoibat as $key => $noibat)
            <ul class="list">
              <li class="item">
                <a href="{{url('xem-truyen/'.$noibat -> slug_truyen)}}" class="thumb"><img style="width: 60px; height: 40px;" src="{{asset('public/uploads/truyen/'.$noibat -> hinhanh)}}"></a>
                <h3 class="title"> <a href="{{url('xem-truyen/'.$noibat -> slug_truyen)}}" >{{$noibat-> tentruyen}}</a></h3>
              </li>
            </ul>
            @endforeach
          </section>

       


          <section class="card-box">
            <h4>Truyện mới đăng</h4>
            @foreach ($truyenmoidang as $key => $moidang)
            <ul class="list">
                <li class="number">
                <span><i class="fa-solid fa-angle-right"></i></span>
                <h3 class="title"> <a href="{{url('xem-truyen/'.$moidang -> slug_truyen)}}" >{{$moidang ->tentruyen}}</a></h3>
              </li>
            </ul>
            @endforeach
          </section>
        </div>

</div>
	

@endsection