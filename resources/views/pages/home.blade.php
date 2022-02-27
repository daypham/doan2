@extends ('../layout')
@section ('slide')
	@include ('pages.slide')
@endsection

@section ('content')

  <div class="album bg-light">
    <div class="row">
        <div class="col-md-9">
          <h3 class="font-weight-bold">SÁCH MỚI CẬP NHẬT</h3>
                  <div class="row">
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
                   
                    
            </div>
          {{$truyen->links('pagination::bootstrap-4')}}
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

  </div>              
           

    

@endsection