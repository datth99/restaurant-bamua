@section('head')
    <style>
        .mt-100 {
    margin-top: 100px
    }

    .card {
        margin-bottom: 30px;
        border: 0;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        letter-spacing: .5px;
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card .card-body {
        padding: 30px;
        background-color: transparent
    }

    .btn-primary,
    .btn-primary.disabled,
    .btn-primary:disabled {
        background-color: #4466f2 !important;
        border-color: #4466f2 !important
    }
    </style>
@endsection

@extends('user.layout.main')
@section('content')

@endsection
<main>
    @if (count($products) > 0)
    <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>{{ $title}}</h1> <br>
                        <ul>
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a>
                            </li>/
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><a href="/thuc-don" title="">Thực đơn</a>
                            </li>/
                            <li style="display: inline-block;
                            position: relative;
                            padding: 0 16px 0 23px;"><span>Chi tiết sản phẩm</span></li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="frame white"></div>
    </div>
    <!-- /hero_single -->
    
     
        
        <form method="post">
            @include('admin.alert')
            <div class="bg_gray">
                <div class="container margin_60_40">
                    @php
                        $total = 0;
                        $ship = 15000;
                    @endphp
                    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>SỐ LƯỢNG</th>
                                <th>Tổng phụ</th>
                                <th> &nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                @php
                                    $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                    $priceEnd = $price * $carts[$product->id];
                                    $total += $priceEnd;
                                    $totalss = $total + $ship;
                                    
                                @endphp
                                <tr>
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="{{ $product->thumb }}" data-src="{{ $product->thumb }}"
                                                class="lazy" alt="Image">
                                        </div>
                                        <span class="item_cart">{{ $product->name }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ number_format($price, 0, '', '.') }}đ</strong>
                                    </td>
                                    <td>
                                        <div class="numbers-row">
                                            <input type="text" id="quantity_1" class="qty2"
                                                name="num_product[{{ $product->id }}]"
                                                value="{{ $carts[$product->id] }}">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ number_format($priceEnd, 0, '', '.') }}đ</strong>
                                    </td>
                                    <td class="p-r-15">
                                        <a href="/gio-hang/xoa/{{ $product->id }}" class="action">
                                            <i class="icon_trash_alt"></i></a>
                                    </td>
                                    <td class="options">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                    
                                @endforeach
                        </tbody>
                    </table>
                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                        <div class="col-sm-4 text-right">
                            <input type="submit" class="btn_1 outline" value="Cập nhật giỏ hàng"
                                formaction="/gio-hang/cap-nhat">
                            @csrf
                        </div>
                    </div>
                    <!-- /cart_actions -->
                </div>
            </div>
            <!-- box_cart -->
            <div class="box_cart">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <ul>
                                <li>
                                    <span>Tổng phụ</span> {{ number_format($total, 0, '', '.') }}đ
                                </li>
                                <li>
                                    <span>Phí giao hàng</span> 15.000đ
                                </li>
                                <li>
                                    <span>TẤT CẢ</span> {{ number_format($totalss, 0, '', '.') }}đ
                                </li>
                            </ul>
                            <a href="thanh-toan" class="btn_1 full-width cart">Thực hiện thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @else
        <div class="container-fluid mt-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body cart">
                            <img src="/teamplate/img/cartenty.png" width="170" height="170" style="  display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 30%;">
                            <div class="col-sm-12 empty-cart-cls text-center"> 
                               
                                <h3><strong>Rất tiếc ... giỏ hàng của bạn trống</strong></h3>
                                <h4>Thêm một cái gì đó để làm cho tôi hạnh phúc :)</h4>
                                
                                 <a href="/thuc-don" class="btn btn-primary cart-btn-transform m-3" data-abc="true">quay lại chọn món</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
</main>
@section('script')
    <!-- SPECIFIC SCRIPTS -->
    <script src="teamplate/js/specific_shop.js"></script>
@endsection






