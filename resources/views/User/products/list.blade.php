@section('head')
    <!-- SPECIFIC CSS -->
    <link href="teamplate/css/shop.css" rel="stylesheet">

    <link rel="stylesheet" href="teamplate/js/RangeSlider/jQuery.UI.css" type="text/css" media="all" />
    <style>
            .price-range-block {
            margin:60px;
        }


        .ui-slider-horizontal {
            width: 500px;
            height: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .ui-widget-header {
            background: #202020;
        }
        .ui-widget.ui-widget-content {border: 2px solid #202020; background: rgb(76, 76, 82)}
        .ui-slider-handle.ui-corner-all.ui-state-default {
            width: 30px;
            height: 30px;
            top: -12px;
            border-radius: 100%;
            background: #202020;
            border: 1px solid #202020;
        }

        .price-range-search {
            background-color: #202020;
            color: #fff;
            border: 1px solid #202020;
            /* display: inline-block; */
            height: 32px;
            border-radius: 5px;
            margin:20px 0;
            font-size:16px;
            font-weight: 
        }
        .price-range-field{
            width: 100px;
            height: 26px;
            background-color:#202020; 
            border: 1px solid #6e6666; 
            color: #fff;
            font-size: 15px;
            border-radius: 5px; 
            padding:5px;
        }
        .search-results-block{
            position: relative;
            display: block;
            clear: both;
            margin-top: 20px;
        }



        
        .offer-menu2-item-single {
	position: relative;
	margin-bottom: 50px;
	float: left;
	padding: 0 15px;
}
.offer-menu2-shadow {
	background: url(/teamplate/img/shadow-frame.png) no-repeat;
	width: 369px;
	height: 17px;
	margin-top: -10px;
	margin-bottom: 10px;
}
.offer-menu2-thumb {
	display: block;
	line-height: 0;
	position: absolute;
	top: 28px;
	left: 43px;
	z-index: 9;
}
.offer-menu2-thumb-image {
	display: block;
	line-height: 0;
	position: absolute;
    top: 15px;
    left: 17px;
    width: 307px;
    height: 210px;
}
.offer-menu2-thumb-image img{
    box-shadow: 0 0 5px rgb(0 0 0 / 80%) !importan
}
.clear {
	clear: both;
}
</style>
@endsection

@extends('user.layout.main')
@section('content')

    <main class="pattern_2">
        <div class="hero_single inner_pages background-image" data-background="url(https://monquang.com.vn/medias/user_files/images/1/2019-04-25-222510banh-trang-cuon-thit-heo.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{ $title }}</h1><br>
                            <p>
                                Tùy theo khu vực và từng cơ sở mà menu có thể khác nhau và giá cả có thể chênh lệch so với website từ 5.000 – 10.000đ.
                              <br>Mong các bạn thông cảm vì sự bất tiện này.
                            </p>
                            {{-- <ul>
                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a>
                                </li>/
                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><span>Thực đơn</span></li>
                            </ul> --}}
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <div class="pattern_2">
	        <div class="container margin_60_40" data-cue="slideInUp">
	          <div class="tabs_menu add_bottom_25">
				    <ul class="nav nav-tabs" role="tablist">
                        {{-- Danh sách danh mục --}}
				        @foreach ($categories as $category)
		                <li class="nav-item" {{ $loop->first ? 'active' : '' }}>
		                    <a  id="tab-{{ $category->id }}" href="#pane-{{ $category->id }}" 
                                 class="nav-link" data-toggle="tab" role="tab">
                                {{ $category->name }}
                            </a>
		                </li>
                        @endforeach 
				    </ul>
                   
				    <div class="tab-content add_bottom_25" role="tablist">
                        {{-- Số lượng danh mục --}}
                        @foreach ($categories as $category)
		                <div id="pane-{{ $category->id }}" class="card tab-pane fade show {{ $loop->first ? 'active' : '' }}" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                            <div class="card-header" role="tab" id="heading-{{ $category->id }}">
                                <h5 class="mb-0">
                                    <a class="" data-toggle="collapse" href="#collapse-{{ $category->id }}" aria-expanded="true" aria-controls="collapse-{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-{{ $category->id }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $category->id }}">
		                        <div class="card-body">
                                        <div class="container">
                                            <div class="row small-gutters">
                                                {{-- Danh sách sản phẩm--}}
                                                @foreach ($category->products as $product)
                                                @php
                                                    $age = 0;
                                                    if ($product->total_rating) {
                                                        $age = round( $product->total_number / $product->total_rating, 2);
                                                    }
                                                @endphp
                                                    <div class="col-6 col-md-4 col-xl-4" data-cue="slideInUp">
                                                        <div class="grid_item">
                                                            <figure>
                                                                <a href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}">
                                                                    <img class="img-fluid lazy" src="{{ $product->thumb }}"
                                                                    data-src="{{ $product->thumb }}" alt="">
                                                                    <div class="add_cart"><span class="btn_1">Chọn món</span></div>
                                                                </a>
                                                            </figure>

                                                            <div class="rating">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <i class="icon_star {{ $age <= $i  ? 'voted' : '' }}  "></i>
                                                                @endfor
                                                            
                                                                <em>{{$product->total_rating}} Đánh giá</em>
                                                            </div>
                                                            <a href="{{ 'thuc-don/' . $product->id }}-{{ \Str::slug($product->name, '-') }}">
                                                                <h3>{{ $product->name }}</h3>
                                                            </a> 
                                                            <div class="price_box">
                                                                <span class="new_price">{{ number_format($product->price_sale, 0, '', '.') }}đ</span>
                                                                <span class="old_price">{{ number_format($product->price, 0, '', '.') }}đ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach 
                                            </div>
                                        </div>
		                           
		                            <!-- /row -->
		                        </div>
		                        <!-- /card-body -->
		                    </div>
		                </div>
                        @endforeach
				        <!-- /tab -->
				    </div>
				    <!-- /tab-content -->
			  </div>
			  <!-- /tabs_menu-->

	          {{-- pagination --}}
              {{-- {!! $products->links() !!} --}}
	        </div>
	        <!-- /container -->
	    </div>
    </main>
@endsection

@section('script')
<script src="teamplate/js/RangeSlider/jQuery.UI.js" type="text/javascript"></script>
<script src="teamplate/js/RangeSlider/price_range_script.js" type="text/javascript"></script>

@endsection
