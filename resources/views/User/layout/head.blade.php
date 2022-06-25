    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Foores - Single Restaurant Version">
    <meta name="author" content="Ansonika">
    <title>{{ $title}}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('teamplate/img/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('teamplate/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('teamplate/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('teamplate/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    <!-- GOOGLE WEB FONT -->
    

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--fix phân trang -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- BASE CSS -->
    <link href="{{ asset('teamplate/css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('teamplate/css/style.css') }}" rel="stylesheet">

    <!--==================== -Main css- ====================-->
    <link href="{{ asset('teamplate/css/custom.css') }}" rel="stylesheet">

     <!-- Blog CSS -->
     <link href="{{ asset('teamplate/css/blog.css') }}" rel="stylesheet">

     <!-- Shop CSS -->
    <link href="{{ asset('teamplate/css/shop.css') }}" rel="stylesheet">

    <!-- LH CSS -->
    <link href="{{ asset('teamplate/css/wizard.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('teamplate/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <style>
        footer .top-footer {
      	position: relative;
	/* padding: 75px 0; */
    /* background-color: #f8da45; */
    /* margin-bottom: 10em;
    margin-top: em; */

    }

    .fixed-bg {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 120%;
        background-size: cover;
        background-repeat: no-repeat; 
    }
    .bg3 {
        background-image: url('{{ asset('teamplate/img/bg_footer.png') }}');
    }
    .wid-payment .thanhtoan {
        width: 241px;
    }
    .ft_center {
        margin-top: 5em;
    }




    footer .top-footer .phone-div {
        display: inline-block;
        width: 150px;
        position: absolute;
        top: -75px;
        left: 50%;
        z-index: 99;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        height: 150px;
        background-color: #fff;
        -webkit-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
    }
    /* @media all and (min-width:992px) */
    .col-lg-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }
    footer .top-footer .widget-payment .wid-payment {
        margin-bottom: 54px;
    }
    footer .top-footer .widget-payment :last-child.wid-payment {
        margin-bottom: 0px;
    }
    footer .top-footer .widget-payment .wid-payment h4 {
        color: #fff;
        font-size: 16px;
        text-transform: capitalize;
        margin-bottom: 17px;
    }
    footer .top-footer .widget-payment .wid-payment ul li {
        display: inline-block;
        margin-right: 6px;
    }
    footer .top-footer .widget-payment .wid-payment ul li:last-child {
        margin-right: 0px;
    }

    footer .top-footer .widget-payment .wid-payment ul li img {
        border-radius: 5px;
        width: 120px;
    }
    .text-center {
        text-align: center !important;
    }
    footer .top-footer .widget-contact {
        padding-top: 38px;
    }

    footer .top-footer .widget-contact > h2 {
        color: #fff;
        font-size: 24px;
        line-height: 29px;
        max-width: 40%;
        margin: 0 auto;
        margin-bottom: 15px;
    }
    footer .top-footer .widget-contact p {
        color: rgb(0, 0, 0);
        margin-bottom: 17px;
    }
    footer .top-footer .widget-contact strong {
        display: block;
        color: #fff;
        font-size: 20px;
    }
    footer .top-footer .widget-contact > h2 span {
        color: #d8ab37;
    }
    footer .top-footer .widget-about > img {
        margin-bottom: 9px;
        margin-left: 67px;
        width: 120px;
        }
    footer .top-footer .widget-about > h4 {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        text-transform: capitalize;
        margin-bottom: 22px;
    }
    footer .top-footer .widget-about p {
        color: rgb(0, 0, 0);
    }
    footer .top-footer .phone-div .border-circle {
        display: inline-block;
        width: 124px;
        position: relative;
        top: 13.5px;
        left: 13.5px;
        border-radius: 50%;
        height: 124px;
    }
    footer .top-footer .phone-div .border-circle::before {
        content: "";
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        border: 2px solid #D8AB37;
        height: 100%;
        -webkit-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        filter: blur(4px);
    }
    footer .top-footer .phone-div .border-circle .phone-circle {
        position: relative;
        left: 22px;
        top: 22px;
        display: inline-block;
        width: 80px;
        height: 80px;
        -webkit-border-radius: 50px;
        -ms-border-radius: 50px;
        border-radius: 50px;
        text-align: center;
        line-height: 110px;
        text-align: center;
        filter: blur(0);
        background: linear-gradient(93.93deg, #fde644 0%, #fda300 100%);
        position: relative;
        z-index: 2;
    }
    footer .top-footer .phone-div .border-circle .phone-circle .ext-link {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
    }
    .gotop {
        margin-bottom: 30px;
        width: 80px;
    }
	</style>
    {{-- HEADER PART CSS START --}}
    <style>

        .header {
            position: absolute;
            width: 100%;
            z-index: 999;
        }

        .navbar-custom {
            background: var(--main-color);
            padding: 15px 15px 15px 40px;
            border-radius: 50px;
            align-items: center;
            margin-left: auto;
        }
        /* color nav begin */
        .navbar-custom li {
            margin: 0 10px;
            position: relative;
        }
        .navbar-custom li a {
            font-size: 16px;
            color: #ffffff !important;
            position: relative;
            transition: all 0.3s;
            font-family: 'Roboto Slab', serif;
        }
        .navbar-custom li a:hover {
            color: rgb(0, 0, 0) !important;
        }
        .navbar-custom li:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: rgb(0, 0, 0);
            left: 0px;
            bottom: 0px;
            transition: all 0.3s;
        }
        /* color nav begin */
        .navbar-custom li:last-child {
            margin: 0;
        }
        .navbar-custom li:last-child::before {
            background: transparent;
        }
        .navbar-custom li:hover::before {
            width: 100%;
        }
        .navbar-custom li.active:before {
            width: 100%;
        }
        .navbar-custom li:hover a {
            color: #fff;
        }
        .navbar-nav .dropdown-menu {
            background: var(--main-color);
        }
        .dropdown-item {
            transition: all 0.3s;
        }
        .dropdown-item:hover {
            border-bottom: 1px solid #fff;
            background: transparent;
        }
        .last-menu-bg {
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
            border-radius: 50px;
            padding: 5px 25px;
        }
        .last-menu-bg span a {
            color: rgb(255, 255, 255) !important;
            transition: all 0.3s;
        }
        .last-menu-bg span a:hover {
            color: rgb(255, 223, 42) !important;
        }
        .navbar-light .navbar-toggler {
            color: rgb(255, 223, 42);
            border-color: rgb(255, 223, 42);
            outline: 0;
            float: left;
            margin-left: 28em;
            margin-bottom: 0.2em;
        }
        .navbar-light .navbar-toggler:hover,
        .navbar-light .navbar-toggler:focus {
            color: rgb(255, 222, 73);
            border-color: rgb(255, 237, 73);
        }
        .navbar-toggler {
            padding: 0.55rem 1rem;
        }

        .navbar-brand {
            display: inline-block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap;
        }
        .sticky {
            position: fixed !important;
            width: 100% !important;
            left: 0 !important;
            top: 0 !important;
            z-index: 9999 !important;
            border-color: #bdb7b7 !important;
            box-shadow: 0 0 5px rgb(0 0 0 / 80%) !important;
            transition: all 0.3s !important;
            background-color: rgb(247, 243, 243)!important;
        }
        .header .logo_sticky {
            display: none;
        }
        /* color nav before */
        .sticky .logo_normal {
            display: none;
        }

        .sticky .logo_sticky {
            display: inline-block;
        }
        .sticky .navbar-custom li a {
            font-size: 16px;
            color: #000000 !important;
            position: relative;
            transition: all 0.3s;
        }

        .sticky .navbar-custom li a:hover {
            color: rgb(255, 255, 255) !important;
        }
        .sticky .navbar-custom li:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: rgb(255, 255, 255);
            left: 0px;
            bottom: 0px;
            transition: all 0.3s;
        }


        .sticky .last-menu-bg {
            background-color: rgb(245, 245, 245);
            color: rgb(0, 0, 0);
            border-radius: 50px;
            padding: 5px 25px;
        }
        .sticky .last-menu-bg span a {
            color: rgb(0, 0, 0) !important;
            transition: all 0.3s;
        }
        .sticky .last-menu-bg span a:hover {
            color: var(--main-color) !important;
        }
        /* color nav before */


        #logo {
            float: left;
        }

        @media (max-width: 991px) {
            #logo {
                float: none;
                width: 100%;
                text-align: center;
            }
            #logo img {
                width: auto;
                height: 45px;
                float: left;
                margin-left: 1em;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
            }
        }

    </style>
{{-- /* HEADER PART CSS END */ --}}

