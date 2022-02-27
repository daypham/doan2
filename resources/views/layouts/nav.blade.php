<div class="container">
  
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item active pr-3">
                            <a class="nav-link" href="{{url('/home')}}"><i class="fa-solid fa-house"></i><span class="sr-only">(current)</span></a>
                          </li>
                          
                          <li class="nav-item dropdown pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa-solid fa-list"></i> Danh mục
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
                              <a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê các danh mục</a>
                            </div>
                          </li> 
                           <li class="nav-item dropdown pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa-solid fa-tags"></i> Thể loại
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a>
                              <a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê các thể loại</a>
                            </div>
                          </li>
                           <li class="nav-item dropdown pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-book"></i> Sách - Truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm Sách - Truyện</a>
                              <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê các Sách - Truyện</a>
                            </div>
                          </li>
                          <li class="nav-item dropdown pr-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa-solid fa-scroll"></i> Chương Sách - Truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Số Chương</a>
                              <a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê các Chương</a>
                            </div>
                          </li>
                        </ul>
                          
                      
                      </div>
                    </nav>
                    
</div>