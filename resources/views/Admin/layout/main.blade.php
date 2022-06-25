<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    @include('admin.layout.head')
</head>

<body>
    <div id="mytask-layout" class="theme-indigo">

        <!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-5 me-0">
            @include('admin.layout.slidebar')
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            @include('admin.layout.header')

            @include('admin.alert')
            {{-- nội dung đây --}}
            @yield('content')

        </div>
    </div>
    
    @include('admin.layout.footer')
</body>
</html>
