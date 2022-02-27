

         <h3 class="pt-4 font-weight-bold">SÁCH HAY NÊN ĐỌC</h3>
                        <div class="owl-carousel owl-theme mb-4">

                            @foreach ($slide_truyen as $key => $slide)

                            <div class="item">
                            <div class="story">
                                <a href="{{url('xem-truyen/'.$slide -> slug_truyen)}}" class="thumb">
                                <img src="{{asset('public/uploads/truyen/'.$slide -> hinhanh)}}"></a>
                                <div class="info">
                                    <h5 class="title-hot"><a href="{{url('xem-truyen/'.$slide -> slug_truyen)}}" class="text-white">{{$slide -> tentruyen}}</a></h5>
                                    <p class="content-sm">Số chương: 520</p>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            </div>
   