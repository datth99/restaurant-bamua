@extends('user.layout.main')
    @section('content')
        <main> 
            <div class="hero_single inner_pages background-image" data-background="url({{ $post->thumb }}"></)">
                <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-lg-10 col-md-8">
                                <h1>{{ $title }}</h1>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                </div>
                <div class="frame white"></div>
            </div>
            <!-- /hero_single -->
            <div class="container margin_60_40">			
                <div class="row">
                    <div class="col-lg-9">
                        <div class="singlepost">
                            {{-- <figure><img alt="" class="img-fluid" src="{{ $post->thumb }}"></figure> --}}
                            <h1>{{ $post->name }}</h1>
                            <div class="postmeta">
                                <ul>
                                    <li><a href="blog/{{$post->postCategory->name}}"><i class="icon_folder-alt"></i> {{ $post->postCategory->name }}</a></li>
                                    <li><i class="icon_calendar"></i> {{ date('d-m-Y', strtotime($post->created_at)) }}</li>
                                    {{-- <li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li> --}}
                                </ul>
                            </div>
                            <!-- /post meta -->
                            <div class="post-content">
                                <div class="dropcaps">
                                    <p>{{ $post->description }}</p>
                                </div>

                                <p>{!! $post->content !!}</p>
                            </div>
                            <!-- /post -->
                        </div>
                        <!-- /single-post -->

                    </div>
                    <!-- /col -->
                    <div class="fb-comments" data-href="{{($post->id )}}-{{ \Str::slug($post->name, '-') }}.html" data-width="" data-numposts="5"></div>

                    <aside class="col-lg-3">
                        <div class="widget">
                            <div class="widget-title first">
                                <h4>Bài đăng Mới nhất</h4>
                            </div>
                            <ul class="comments-list">
                                @foreach ($postnew as $post)
                                <li>
                                    <div class="alignleft">
                                        <a href="{{($post->id )}}-{{ \Str::slug($post->name, '-') }}.html"><img src="{{ $post->thumb}}" alt=""></a>
                                    </div>
                                    <small>Thể loại - {{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                                    <h3><a href="{{($post->id )}}-{{ \Str::slug($post->name, '-') }}.html" title="">{{ $post->name }}</a></h3>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /widget -->
                        {{-- <div class="widget">
                            <div class="widget-title">
                                <h4>Popular Tags</h4>
                            </div>
                            <div class="tags">
                                <a href="#">Food</a>
                                <a href="#">Bars</a>
                                <a href="#">Cooktails</a>
                                <a href="#">Shops</a>
                                <a href="#">Best Offers</a>
                                <a href="#">Transports</a>
                                <a href="#">Restaurants</a>
                            </div>
                        </div> --}}
                        <!-- /widget -->
                    </aside>
                    <!-- /aside -->
                </div>
                <!-- /row -->	
            </div>
            <!-- /container -->
        </main>
    @endsection
