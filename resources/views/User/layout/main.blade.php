<!DOCTYPE html>
<html lang="en">

<head>
    @include('User.layout.head')
    @yield('head')
</head>

<body>
    <!-- Page Preload -->
    {{-- <div id="page_preloader"></div> --}}
    <div id="preloader" style="display: none;">
		<div data-loader="circle-side" style="display: none;"></div>
	</div>

    <!-- header -->
    @include('User.layout.header')

    <!-- main -->
    @yield('content')

    <!-- footer-->
    @include('User.layout.footer')
    
    <!-- layout-->
    @include('User.layout.script')
    @yield('script')
</body>

</html>
