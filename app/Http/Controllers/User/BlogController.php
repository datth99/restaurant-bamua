<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = Post::OrderBy('id', 'desc')->where('active', 1)->paginate(6);
        $postnew = $this->postService->postnew();
        $catB = PostCategory::where('active', 1)->get();
        $title ='Tin tức - Mì Quảng Bà Mua';
        
        return view('user.blog.list', compact('posts', 'title', 'postnew', 'catB'));
    }

    // Trang chi tiết
    public function detail($id = '', $slug = '')
    {
        $post = $this->postService->show($id);
        $postnew = $this->postService->postnew(); 
        return view('user.blog.detail', [
            'title' => 'Chi tiết bài viết - Mì Quảng Bà Mua',
            'post' => $post,
            'postnew' => $postnew
        ]);
    }
    //Danh mục
    public function category($name, Request $request)
    {
        $catB = PostCategory::all();
        $postnew = $this->postService->postnew(); 
        $posts = PostCategory::where('name', $name)->first()->posts->toQuery()->paginate(6);
        $title ='Tin tức theo danh mục - Mì Quảng Bà Mua';
        return view('user.blog.list', compact('posts', 'title', 'postnew', 'catB'));
    }

    // Tìm kiếm 
    public function search(Request $request)
    {
        $search = $request->search ?? '';
        $posts = Post::where('name', 'LIKE', '%' .$search. '%')->get();

        // $tukhoa = $_GET['tukhoa'];
        // $getpost =  Post::where('name', 'LIKE', '%' .$tukhoa. '%')
        // ->OrWhere('description', 'LIKE', '%' .$tukhoa. '%')
        // ->get();

        // $postnew = $this->postService->postnew();
        return view('user.blog.list', compact('posts', 'name', 'postnew', 'catB'));
        return view('user.blog.list', [
            'title' => 'Tin tức - Mì Quảng Bà Mua',
            'posts' => $this->postService->PostList(),
            'tukhoa' ,
            // 'getpost' => $getpost
        ]);
    }

}
