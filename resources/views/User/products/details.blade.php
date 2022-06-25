@extends('user.layout.main')
@section('content')
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image" data-background="url({{ $product->thumb }})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1> <br>
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
        <!-- /Endhero_single -->
        @php
            $age = 0;
            if ($product->total_rating) {
                $age = round( $product->total_number / $product->total_rating, 2);
            }
        @endphp
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-6 magnific-gallery">
                    <p>
                        <a href="{{ $product->thumb }}" title="Photo title" data-effect="mfp-zoom-in"><img
                                src="{{ $product->thumb }}" alt="" class="img-fluid"></a>
                    </p>
                </div>
                <div class="col-lg-6" id="sidebar_fixed">
                    <div class="prod_info">
                        <span class="rating">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="icon_star {{ $age <= $i  ? 'voted' : '' }}  "></i>
                            @endfor
                           
                            <em style="font-size: 1.2em">{{$product->total_rating}} Đánh giá</em>
                        </span>
                        <h1>{{ $title }}</h1>
                        <p>{{ $product->description }}</p>
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                                <span class="new_price">{{ number_format($product->price_sale, 0, '', '.') }}đ</span>
                                <span class="old_price">{{ number_format($product->price, 0, '', '.') }}đ</span>
                            </div>
                        </div>

                        <form action="/gio-hang/them-gio-hang" method="post">
                            @if ($product->price !== null)
                                {{-- Số lượng --}}
                                <div class="prod_options">
                                    <div class="row">
                                        <label class="col-xl-5 col-lg-5  col-md-6 col-6">
                                            <strong>Số lượng</strong>
                                        </label>
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                            <div class="numbers-row">
                                                <input type="text" value="1" id="quantity_1" class="qty2"
                                                    name="num_product">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Thêm vô giỏ hàng --}}
                                <div class="row">

                                    <div class="col-lg-4 col-md-6">
                                        <button type="submit" class="btn_add_to_cart btn_1c">
                                            Thêm vô giỏ hàng
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @endif
                            @csrf
                        </form>
                    </div>
                    <!-- /prod_info -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /Endcdetail -->

        <div class="tabs_product">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Miêu tả</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Viết đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /tabs_product -->
        <div class="tab_content_wrapper">
            <div class="container">
                <div class="tab-content" role="tablist">
                    {{-- Mô tả --}}
                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                    aria-controls="collapse-A">
                                    Mô tả
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ $product->content }}
                                    </div>
                                    <div class="col-md-6">
                                        {!! $product->description !!}
                                        <!-- /table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Đánh giá --}}
                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                    aria-controls="collapse-B">
                                    Đánh giá
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    @foreach ($productcmt as $cmt)
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                    <span class="rating">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="icon_star{{ $cmt->rating <= $i ? ' empty' : '' }}"></i>
                                                        @endfor

                                                        <em>{{ $cmt->rating }}/5.0</em>
                                                    </span>
                                                    <em>{{ date('M d, Y', strtotime($cmt->created_at)) }}</em>
                                                </div>
                                                <h4>{{ $cmt->name }}</h4>
                                                <p>{{ $cmt->messages }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                    {{-- Viết đánh giá --}}
                    <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                        <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false"
                                    aria-controls="collapse-C">
                                    Viết đánh giá
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <div class="write_review">
                                    <h1>Viết đánh giá</h1>
                                    <form action="/danh-gia-{{ $product->id }}-{{ \Str::slug($product->name, '-') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? null }}">
                                        <input type="hidden" name="active" value="0">

                                        <!-- /rating_submit -->
                                        <div class="form-group">
                                            <label>Tên </label>
                                            <input class="form-control" name="name" type="text" placeholder="Họ và Tên">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="text"
                                                placeholder="Địa chỉ Email">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" name="messages" style="height: 280px;"
                                                placeholder="Nội dung đánh giá của bạn"></textarea>
                                        </div>
                                        <div class="rating_submit">
                                            <div class="form-group mb-2">
                                                <label class="d-block">Xếp hạng tổng thể</label>
                                                <span class="rating mb-0">
                                                    <input type="radio" class="rating-input" id="5_star" name="rating"
                                                        value="5">
                                                    <label for="5_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="4_star" name="rating"
                                                        value="4">
                                                    <label for="4_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="3_star" name="rating"
                                                        value="3">
                                                    <label for="3_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="2_star" name="rating"
                                                        value="2">
                                                    <label for="2_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="1_star" name="rating"
                                                        value="1">
                                                    <label for="1_star" class="rating-star"></label>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn_1">Gửi đánh giá</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
        </div>

        <!-- liên quan -->
        <div class="container margin_60_40">
            <h2>Món liên quan</h2>
            <div class="row small-gutters">
                @foreach ($repproduct as $rep)
                @php
                    $agerep = 0;
                    if ($rep->total_rating) {
                        $agerep = round( $rep->total_number / $rep->total_rating, 2);
                    }
                @endphp
                    <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                        <div class="grid_item">
                            <figure>
                                <a href="{{ $rep->id }}-{{ \Str::slug($rep->name, '-') }}">
                                    <img class="img-fluid lazy" src="{{ $rep->thumb }}" data-src="{{ $rep->thumb }}"
                                        alt="loihinh">
                                    <div class="add_cart"><span class="btn_1">Thêm vô giỏ hàng</span></div>
                                </a>
                            </figure>
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="icon_star {{ $agerep <= $i  ? 'voted' : '' }}  "></i>
                                @endfor
                            
                                <em>{{$rep->total_rating}} Đánh giá</em>
                            </div>
                            <a href="{{ $rep->id }}-{{ \Str::slug($rep->name, '-') }}">
                                <h3>{{ $rep->name }}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{ number_format($rep->price, 0, '', '.') }}đ</span>
                                <span class="old_price">{{ number_format($rep->price_sale, 0, '', '.') }}đ</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>
@endsection

@section('script')

<script src="{{ asset('teamplate/js/specific_shop.js') }}"></script> 
<script src="{{ asset('teamplate/js/sticky_sidebar.min.js') }}"></script>
<script>
    // Sticky sidebar
    $('#sidebar_fixed').theiaStickySidebar({
        minWidth: 991,
        updateSidebarHeight: true,
        additionalMarginTop: 90
    });
</script>
@endsection
