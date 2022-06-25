
    <div class="d-flex flex-column h-100">
        <a href="/admin/" class="mb-0 brand-icon">
            <span class="logo-icon">
               <img src="/teamplate/admin/assets/images/logoadmin.png" alt="">
            </span>
            <span class="logo-text">Quản Lý Cửa Hàng Mì Quảng</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <!-- Menu: Quản lý Bài viết giới thiệu -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#abouts" href="#">
                <i class="icofont-certificate-alt-1"></i><span>Quản lý giới thiệu</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="abouts">
                    <li><a class="ms-link" href="/admin/abouts/list"><span>Bài viết giới thiệu</span> </a></li>
                    <li><a class="ms-link" href="/admin/galleries/list"><span>Quản lý hình ảnh</span> </a></li>
                </ul>
            </li>

            <!-- Menu: Quản lý Sản phẩm soup-bowl -->
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#products" href="#">
                <i class="icofont-soup-bowl"></i><span>Quản lý thực đơn</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="products">
                    <li><a class="ms-link" href="/admin/products/list"><span>Quản lý món ăn</span> </a></li>
                    <li><a class="ms-link" href="/admin/productcategories/list"><span>Quản lý loại món ăn</span> </a></li>
                    <li><a class="ms-link" href="/admin/productcomments/list"><span>Quản lý bình luận món ăn</span> </a></li>
                </ul>
            </li>

            <!-- Menu: Quản lý Slider -->
            <li class="collapsed">
                <a class="m-link" href="/admin/sliders/list">
                    <i class="icofont-file-tiff"></i><span>Quản lý Slider</span> 
                </a>
            </li>

            <!-- Menu: Quản lý danh mục -->
            <li class="collapsed">
                <a class="m-link" href="/admin/menus/list">
                    <i class="icofont-align-right"></i> <span>Quản lý Danh mục</span>
                </a>
            </li>

            <!-- Menu: Quản lý Blog -->
            <li class="collapsed">
                <a class="m-link"  data-bs-toggle="collapse" data-bs-target="#Blogs" href="#">
                    <i class="icofont-blogger"></i><span>Quản lý Blog</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="Blogs">
                    <li><a class="ms-link" href="/admin/posts/list"><span>Bài viết</span> </a></li>
                    <li><a class="ms-link" href="/admin/postcategories/list"><span>Danh mục bài viết</span> </a></li>
                </ul>
            </li>

            <!-- Menu: Quản lý Đơn hàng -->
            <li class="collapsed">
                <a class="m-link" href="/admin/customers/">
                    <i class="icofont-document-folder"></i><span>Quản lý Đơn hàng</span> 
                </a>
            </li>

            <!-- Menu: Thống kê -->
            {{-- <li class="collapsed">
                <a class="m-link" href="/admin/">
                    <i class="icofont-briefcase"></i><span>Thống kê</span> 
                </a>
            </li> --}}



        </ul>
        <!-- EndMenu: main ul -->

        <!-- Theme: Switch Theme -->
        <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center justify-content-center">
                <div class="form-check form-switch theme-switch">
                    <input class="form-check-input" type="checkbox" id="theme-switch">
                    <label class="form-check-label" for="theme-switch">Bậc chê độ tối!</label>
                </div>
            </li>
        </ul>
        
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
