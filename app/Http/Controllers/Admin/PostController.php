<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    protected $postService;


    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return view('admin.post.list', [
            'titles' => 'Danh Sách Bài Viết Mới Nhất',
            'posts' => $this->postService->get()
        ]);
    }

    
    public function create()
    {
        return view('admin.post.add', [
           'titles' => 'Thêm Bài viết mới',
           'posts' => $this->postService->getCategoryPost()
        ]);
    }
   
    public function store(PostRequest $request)
    {
        $this->postService->insert($request);
        return redirect('/admin/posts/list');
    }

    public function show(Post $post)
    {
        return view('admin.post.edit', [
            'titles' => 'Chỉnh Sửa Bài viết',
            'post' => $post,
            // 'posts' => $this->postService->getCategoryPost()
            'postCategories' => $this->postService->getCategoryPost()
        ]);
    }
   

    public function update(Request $request, Post $post)
    {
        $result = $this->postService->update($request, $post);
        if ($result) {
            return redirect('/admin/posts/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->postService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
