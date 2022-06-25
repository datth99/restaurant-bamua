@section('head')
    <style>
        .search-box{
  width: 100%;
  position: relative;
  display: flex;

}
.search-input{
  width: 100%;
  padding: 10px;
  border: 4px solid #f8da45;
  border-radius:10px 0 0 10px ;
  border-right: none;
  outline: none;
  /* font-size: 20px; */
  color: #f8da45;;
  background: none;
}
.search-button{
 text-align: center;
height: 51px;
width: 40px;
outline: none;
cursor: pointer;
border: 4px solid #f8da45;
 border-radius: 0 10px 10px 0 ;
border-left: none;
background: none;
font-size: 20px;
border-left: 4px solid #f8da45;


}
    </style>
     <script src="https://kit.fontawesome.com/43dcc20e7a.js" crossorigin="anonymous"></script>
@endsection
@extends('user.layout.main')
    @section('content')
        <main>
            <div class="hero_single inner_pages background-image" data-background="url(teamplate/img/tintuc.jpg)">
                <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-lg-10 col-md-8">
                                <h1>Trang tin tức</h1>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                </div>
                <div class="frame white"></div>
            </div>
            <!-- /hero_single -->
            <div class="pattern_2">
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
                                                <h2><a href="{{ 'blog/' . $post->id }}-{{ \Str::slug($post->name, '-') }}.html">{{ $post->name }}</a></h2>
                                                <p>{{ $post->description }}</p>
                                            </div>
                                        </article>
                                        <!-- /article -->
                                    </div>
                                @endforeach 
                            </div>
                            <!-- /row -->
                            {!! $posts->links() !!} 
                        </div>
                        <!-- /col -->

                        <aside class="col-lg-3 bg-white">
                            <div class="widget ">
                                <div class="widget-name first">
                                    <h4>Bài đăng mới nhất</h4>
                                </div>
                                <ul class="comments-list">
                                    @foreach ($postnew as $new)
                                    <li>
                                        <div class="alignleft">
                                            <a href="{{ 'blog/' . $new->id }}-{{ \Str::slug($new->name, '-') }}"><img src="{{ $new->thumb }}" alt=""></a>
                                        </div>
                                        <small>Category - {{ date('m.d.y', strtotime($new->created_at)) }}</small>
                                        <h3><a href="{{ 'blog/' . $new->id }}-{{ \Str::slug($new->name, '-') }}" title="">{{ $new->name }}</a></h3>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /widget -->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4>Danh mục</h4>
                                </div>
                                <ul class="cats bg-white">
                                    @foreach ($catB as $cat)
                                        <li><a href="blog/{{$cat->name}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /widget -->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4>Tìm kiếm  bài viết</h4>
                                </div>
                                <form action="blog">
                                    <div class="search-box">
                                        <input type="text" name="search" value="{{request('search')}}"
                                        class="search-input" placeholder="Nhập từ khóa tìm kiếm...">
                                
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
            </div>
            <!-- /container -->
        </main>
    @endsection
