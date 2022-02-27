<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đọc Sách Miễn Phí</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
         <link href="{{ asset('css/style.css') }}" rel="stylesheet">
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
         <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">


         <style type="text/css">
         .icon{
          font-size: 30px;
         }
          .navbar-dark .navbar-nav .nav-link{
            color: #fff;
          }
      
          .navbar-nav.mr-auto li a {
            font-size: 17px;
          }
          .card.mb-3.box-shadow  img{
            height: 230px;
            object-fit: contain;
            }
         </style>
    </head>


<body class="antialiased">
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
              <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/uploads/logo/logobook.png')}}" style="height: 50px; "></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link pr-3" href="{{url('/')}}">
                      <i class="fa-solid fa-house"></i>
                     Trang chủ
                    </a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link pr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-list"></i> Danh mục sách
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($danhmuc as $key => $danh)
                      <a class="dropdown-item" href="{{url('danh-muc/'.$danh -> slug_danhmuc)}}"><i class="fas fa-list"></i> {{$danh -> tendanhmuc}}</a>
                      @endforeach
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link pr-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa-solid fa-tags"></i> Thể loại
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @foreach ($theloai as $key => $the)
                      <a class="dropdown-item" href="{{url('the-loai/'.$the -> slug_theloai)}}"><i class="fa-solid fa-tags"></i> {{$the -> tentheloai}}</a>
                      @endforeach
                    </div>
                  </li>
                 
                
             </ul>
            <form class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="GET">
                <input class="form-control mr-sm-1" type="search" name="tukhoa" placeholder="Nhập tên sách, tác giả" aria-label="Search">
                <button class="btn btn-light my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
               </form>
          </div>
      </div>
            <label for="checkbox" class="theme-switch mb-0 mr-2">
                  <input type="checkbox" name="checkbox" class="checkbox" >
            </label>
  </nav>



          <div class="container" >

            

                     @yield('slide')

                     @yield('content')


        </div>
        <div id="back-to-top">
          
          <i class="fa-solid fa-chevron-up"></i>
        </div>

             <!-------------------------footer-------------------------->
        <footer class="bg-dark text-center text-white">
              <!-- Grid container -->
              <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                  <!-- Facebook -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"></i
                  ></a>

                  <!-- Twitter -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"></i
                  ></a>

                  <!-- Google -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"></i
                  ></a>

                  <!-- Instagram -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"></i
                  ></a>

                  <!-- Linkedin -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                  ></a>

                  <!-- Github -->
                  <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-github"></i
                  ></a>
                </section>
                <!-- Section: Social media -->
              </div>
              <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright
          </div>
          <!-- Copyright -->
        </footer>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <!-- //scroll top -->
        <script>
            jQuery(document).ready(function ($) {
            if ($(window).scrollTop() > 200) {
              $('#back-to-top').fadeIn();
                } else {
              $('#back-to-top').fadeOut();
                }
              
              $(window).scroll(function () {
              if ($(this).scrollTop() > 200) {
                      $('#back-to-top').fadeIn();
                  } else {
                      $('#back-to-top').fadeOut();
                  }
              });

              $('#back-to-top').click(function () {
                  $("html, body").animate({
                      scrollTop: 0
                  }, 600);
                  return false;
              });
          });
        </script>

        <!-- xem mục lục -->
        <script type="text/javascript">
            $('.xemmucluc').click(function(){
                $('html, body').animate({
                    scrollTop: $(".titlemucluc").offset().top
                  }, 1000);
              });
        </script>

         <!-- đổi màu theme -->

         <script type="text/javascript">
            const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
            const switchTheme =(e)=> {
              if(e.target.checked){
                document.documentElement.setAttribute('data-theme','dark');
                localStorage.setItem('theme','dark');
              }else{
                 document.documentElement.setAttribute('data-theme','light');
                 localStorage.setItem('theme','light');
              }
            }
            const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

            if(currentTheme){
              document.documentElement.setAttribute('data-theme',currentTheme);
              if (currentTheme === 'dark'){
                toggleSwitch.checked = true;
              }
            }

            toggleSwitch.addEventListener('change',switchTheme)

         </script>

        <!-- owl carousel -->
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            dots:false,
            autoplayTimeout:3000,
            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
            })

        </script>
        <script type="text/javascript">
          $('.select-chapter').on('change',function() {
            var url = $(this).val();
            if (url){
              window.location = url;
            }
              return false;
          });
          current_chapter();
          function current_chapter(){
            var url =window.location.href;
            $('.select-chapter').find('option[value="'+url+'"]').attr("selected",true);
          }
        </script>
    </body>
</html>
