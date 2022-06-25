
@extends('user.layout/main')
@section('content')
<main>
    <div class="pattern_2">
    <div class="container margin_60_40">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <br> <br> <br>
                <div class="box_booking_2">
                    <div class="head">
                        <div class="title">
                        <h3>Mì Quảng Bà Mua</h3>
                    </div>
                    </div>
                    <!-- /head -->
                    <div class="main">
                        <div id="confirm">
                            <div class="icon icon--order-success svg add_bottom_15">
                                <center>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                                        <g fill="none" stroke="#8EC343" stroke-width="2">
                                            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                        </g>
                                    </svg>
                                </center>
                               
                            </div>
                            <h3>{{ $title }}!</h3>
                            <p>Quay lại - <a href="/">Trang chủ</a></p>
                        </div>
                    </div>
                </div>
                <!-- /box_booking -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /pattern_2 -->
</div>

</main>
<!-- /main -->
@endsection