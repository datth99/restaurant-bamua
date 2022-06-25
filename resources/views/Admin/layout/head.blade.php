    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon"> 
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('/teamplate/admin/assets/css/my-task.style.min.css') }}">
    <link href="{{ asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('head')