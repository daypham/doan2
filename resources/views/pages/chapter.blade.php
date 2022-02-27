@extends ('../layout')

@section ('content')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url ('danh-muc/'.$duongdan->danhmuctruyen -> slug_danhmuc)}}">{{$duongdan -> danhmuctruyen -> tendanhmuc}}</a></li>
    <li class="breadcrumb-item"><a href="{{url ('the-loai/'.$duongdan->theloai -> slug_theloai)}}">{{$duongdan -> theloai -> tentheloai}}</a></li>
      <li class="breadcrumb-item active">{{$duongdan -> tentruyen}}</li>

  </ol>
</nav>


<div class="row">
	<div class="col-md-12">
		<h3>{{$chapter -> truyen -> tentruyen}}</h3>
		<div class="col-md-5">
			<div class="form-group-add">
						<label style="color: var(--text-color);">Chọn chương:</label>
						<select class="form-control select-chapter" >

							@foreach ($all_chapter as $key => $chap)

							<option value="{{url('xem-chapter/'.$chap -> slug_chapter)}}">{{$chap ->tieude}}</option>
							@endforeach
						</select>
						<a href="{{url('xem-chapter/'.$taptruoc)}}" class="btn btn-success mt-2 {{$chapter -> id == $min_id->id ? 'disabled':''}} ">« Tập trước</a>
						<a href="{{url('xem-chapter/'.$tapsau)}}" class="btn btn-success mt-2 {{$chapter -> id == $max_id->id ? 'disabled':''}} ">Tập sau »</a>
				</div>

			</div>
			<div class="col-md-12 mt-1">
	                      <div class="card mb-12 box-shadow">
	                        <div class="card-body">
	                         {!!$chapter -> noidung!!}
	                        </div>
	                      </div>
	                    </div> 


		
		<div class="col-md-5">
			<div class="form-group-add mt-3">
						<label style="color: var(--text-color);">Chọn chương</label>
						<select class="form-control select-chapter" >

							@foreach ($all_chapter as $key => $chap)

							<option value="{{url('xem-chapter/'.$chap -> slug_chapter)}}">{{$chap ->tieude}}</option>
							@endforeach
						</select>
						<a href="{{url('xem-chapter/'.$taptruoc)}}" class="btn btn-success mt-2 {{$chapter -> id == $min_id->id ? 'disabled':''}} ">« Tập trước</a>
						<a href="{{url('xem-chapter/'.$tapsau)}}" class="btn btn-success mt-2 {{$chapter -> id == $max_id->id ? 'disabled':''}} ">Tập sau »</a>
				</div>

			</div>
</div>

	
		
			
			
	</div>


	

@endsection