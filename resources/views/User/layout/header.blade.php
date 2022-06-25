{{-- <header class="header header_in is_sticky clearfix element_to_stick">
    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
    <div class="container-fluid">
        <div id="logo">
            <a href="/">
                <img src="teamplate/img/logo.png" width="140" height="35" alt="" class="logo_normal">
				<img src="teamplate/img/alternative-logo.png" width="140" height="35" alt="" class="logo_sticky">
            </a>
        </div>
        <!-- /cart -->
        <ul id="top_menu">
            <li><a href="#0" class="search-overlay-menu-btn"></a></li>
            <li>
                <div class="dropdown dropdown-cart">
                    <a href="/shop-cart"
                        class="cart_bt"><strong>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</strong></a>
                    @include('User.layout.cart')
                </div>
            </li>
        </ul>
        <!-- /top_menu -->
        <a href="#0" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="/"><img src="img/logo.svg" width="140" height="35" alt=""></a>
            </div>
            <!-- nav -->
            <ul>

                <li class="active-menu">
                    <a href="/" class="show-submenu">Trang chủ</a>
                </li>
                <li class="active-menu">
                    <a href="thuc-don" class="show-submenu">Thực đơn</a>
                </li>
                <li class="active-menu">
                    <a href="/blog" class="show-submenu">Blog</a>
                </li>
                <li class="active-menu">
                    <a href="/lien-he" class="show-submenu">Liên hệ</a>
                </li>
                <li><a href="/dat-ban" class="btn_top">Đặt bàn</a></li>
                @if (Auth::check())
                <li> <a class="btn_top" href="/dang-xuat">Đăng xuất</a></li>
                @else   
                <li><a class="btn_top" href="/dang-nhap">Đăng nhập</a></li>
               @endif
            </ul>
        </nav>
        <!-- End nav -->
    </div>
<!-- Search -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><span class="closebt"><i class="icon_close"></i></span></span>
    <form role="search" id="searchform" action="/thuc-don" method="get">
        <input value="{{ request('search')}}" name="search" type="search" placeholder="Nhập từ khóa đồ uống cần tìm kiếm..." />
        <button type="submit"><i class="icon_search"></i></button>
    </form>
</div><!-- End Search -->
</header> --}}



       <!--HEADER PART START-->
       <header>
        <div class="header py-1">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                    <div id="logo">
                        <a href="/">
                            <img src="{{ asset('teamplate/img/logo0.png') }}" width="170" height="50" alt="" class="logo_normal">
                            <img src="{{ asset('teamplate/img/logo1.png') }}" width="170" height="50" alt="" class="logo_sticky">
                        </a>
                       
                    </div>
              
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icofont-navigation-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar-custom">
                            <li class="nav-item {{ (request()->segment(1) == '') ? 'active' : ''}}">
                                <a class="nav-link" href="/">Trang chủ</a>
                            </li>
                            <li class="nav-item {{ (request()->segment(1) == 'thuc-don') ? 'active' : ''}}">
                                <a class="nav-link" href="/thuc-don">Thực đơn</a>
                            </li>
                            <li class="nav-item {{ (request()->segment(1) == 'blog') ? 'active' : ''}}">
                                <a class="nav-link" href="/blog">Tin tức</a>
                            </li>

                            <li class="nav-item {{ (request()->segment(1) == 'gioi-thieu') ? 'active' : ''}}">
                                <a class="nav-link" href="/gioi-thieu">Giới thiệu</a>
                            </li>
                           
                            <li class="nav-item last-menu-bg {{ (request()->segment(1) == 'dat-ban') ? 'active' : ''}}">
                                <span class="nav-link"><a href="/dat-ban">Đặt bàn</a></span>
                            </li>
                            
                        </ul>
                           <!-- /cart -->
        <ul id="top_menu">
            <li>
                <div class="dropdown dropdown-cart">
                    <a href="/gio-hang" class="cart_bt">
                        <strong>
                            {{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}
                        </strong>
                    </a>
                    @include('User.layout.cart')
                </div>
            </li>
        </ul>
                         {{-- <img src="\teamplate\admin\assets\images\profile_av.png" alt=""width="36" height="36" class="rounded-circle mx-2"> --}}
                        {{-- <ul>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   
                                 Xin chào Trung
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Chỉnh sửa thông tin</a>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Trạng thái đơn hàng</a>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="blog.html">Đăng xuất</a>
                                </div>
                            </li>
                        </ul> --}}
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--HEADER PART END-
