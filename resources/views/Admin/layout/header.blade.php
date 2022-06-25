<div class="header">
    <nav class="navbar py-4">
        <div class="container-xxl">

            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                <div class="d-flex">

                </div>
                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm ">Chào <span
                                class="font-weight-bold">{{ Auth::user()->name }}</span></p>
                        {{-- <small>Admin Profile</small> --}}
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                        data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail"
                            src="{{ Auth::user()->avatar ?? '/teamplate/admin/assets/images/profile_av.png'}}" alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle"
                                        src="\teamplate\admin\assets\images\profile_av.png" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold"></span></p>
                                        <small class="">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>

                                <div>
                                    <hr class="dropdown-divider border-dark">
                                </div>
                            </div>
                            <div class="list-group m-2 ">
                                {{-- <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>Hồ sơ</a> --}}
                                <a href="/admin/members/list"
                                    class="list-group-item list-group-item-action border-0 "><i
                                        class="icofont-ui-user-group fs-6 me-3"></i>Tài khoản người dùng</a>
                                <a href="/dang-xuat"
                                    onclick="return confirm('Bạn có chắc chắn muốn thoát?')"
                                    class="list-group-item list-group-item-action border-0 "><i
                                        class="icofont-logout fs-6 me-3"></i>Đăng xuất</a>
                                <div>
                                    <hr class="dropdown-divider border-dark">
                                </div>
                                <a href="/admin/add-admins"
                                    class="list-group-item list-group-item-action border-0 ">
                                    <i class="icofont-contact-add fs-5 me-3"></i>Thêm tài khoản quản trị
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- menu toggler -->
             <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>
            
            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                {{-- <form method="GET" action="/admin/search">
                    <div class="input-group flex-nowrap input-group-lg">
                        <button type="button" class="input-group-text">
                            <i class="fa fa-search"></i>
                        </button>

                        <input type="search" name="tukhoa" class="form-control" placeholder="Tìm kiếm theo từ khóa">

                        <button type="button" class="input-group-text add-member-top">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </form> --}}
            </div> 

        </div>
    </nav>
</div>