@section('head')
    <style>
        .search-box {
            width: 100%;
            position: relative;
            display: flex;

        }

        .search-input {
            width: 100%;
            padding: 10px;
            border: 4px solid #978667;
            border-radius: 10px 0 0 10px;
            border-right: none;
            outline: none;
            /* font-size: 20px; */
            color: #8b7b5d;
            ;
            background: none;
        }

        .search-button {
            text-align: center;
            height: 51px;
            width: 40px;
            outline: none;
            cursor: pointer;
            border: 4px solid #978667;
            border-radius: 0 10px 10px 0;
            border-left: none;
            background: none;
            font-size: 20px;
            border-left: 4px solid #978667;


        }

    </style>
    <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
@endsection
@extends('user.layout.main')
@section('content')
    <main>
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-6" data-cue="slideInUp">
                                <article class="blog">
                                    <figure>
                                        <a href="{{ 'blog/' . $post->id }}-{{ \Str::slug($post->name, '-') }}.html">
                                            <img src="{{ $post->thumb }}" alt="">
                                            <div class="preview"><span>Đọc thêm</span></div>
                                        </a>
                                    </figure>
                                    <div class="post_info">
                                        <small>{{ date('d-m-Y', strtotime($post->created_at)) }}</small>
                                        <h2><a
                                                href="{{ 'blog/' . $post->id }}-{{ \Str::slug($post->name, '-') }}.html">{{ $post->name }}</a>
                                        </h2>
                                        <p>{{ $post->description }}</p>
                                        {{-- <ul>
                                                <li>
                                                    <div class="thumb"><img src="img/avatar.jpg" alt=""></div> Admin
                                                </li>
                                                <li><i class="icon_comment_alt"></i>20</li>
                                            </ul> --}}
                                    </div>
                                </article>
                                <!-- /article -->
                            </div>
                        @endforeach

                    </div>
                    <!-- /row -->



                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    <div class="widget">
                        <div class="widget-title first">
                            <h4>Bài đăng mới nhất</h4>
                        </div>
                        <ul class="comments-list">
                            @foreach ($postnew as $new)
                                <li>
                                    <div class="alignleft">
                                        <a href="{{ 'blog/' . $new->id }}-{{ \Str::slug($new->name, '-') }}"><img
                                                src="{{ $new->thumb }}" alt=""></a>
                                    </div>
                                    <small>Category - {{ date('m.d.y', strtotime($new->created_at)) }}</small>
                                    <h3><a href="{{ 'blog/' . $new->id }}-{{ \Str::slug($new->name, '-') }}"
                                            title="">{{ $new->name }}</a></h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-title">
                            <h4>Danh mục</h4>
                        </div>
                        <ul class="cats">
                            {{-- @foreach ($cats as $cat)
                                    <li><a href="#">{{ $cat->name }} <span>2</span></a></li>
                                @endforeach --}}
                        </ul>
                    </div>
                    <!-- /widget -->
                    <div class="widget">
                        <form action="/tim-kiem" method="GET">
                            <div class="search-box">
                                <input type="text" name="tukhoa" class="search-input"
                                    placeholder="Nhập từ khóa tìm kiếm...">

                                <button class="search-button" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>


                    </div>
                    <!-- /widget -->
                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection
