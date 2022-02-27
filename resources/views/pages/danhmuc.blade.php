@extends ('../layout')
{{-- @section ('slide')
	@include ('pages.slide')
@endsection --}}

@section ('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active">{{$tendanhmuc}}</li>
  </ol>
</nav>

      <h3 class="mt-2"></h3>
      <h3>{{$tendanhmuc}}</h3>

                <div class="container">

                  <div class="row">
                  	@php
                  		$count = count($truyen);
                  	@endphp
                  	@if ($count==0)
                  		<div class="col-md-12 mb-3">
	                      <div class="card mb-12 box-shadow">
	                        <div class="card-body">
	                         <span >Đang cập nhật</span>
	                        </div>
	                      </div>
	                    </div> 
                  	@else
                    @foreach ($truyen as $key => $value)
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
                   @endif
                    
                </div>

          </div>

           

            <!--------------------------------------------------------->
    
    

@endsection