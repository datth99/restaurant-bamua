<?php


namespace App\Http\Services\Post;


use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class PostService
{
    public function getCategoryPost()
    {
        return PostCategory::get();
    }
    public function insert($request)
    {
        try {
            $request->except('_token');
            // dd($request->input());
            Post::create($request->all());
            Session::flash('success', 'Thêm bài viết mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Post::with('postCategory')->orderByDesc('id')->paginate(5);
    }

    public function update($request, $post)
    {
        try {
            $post->fill($request->input());
            $post->save();
            Session::flash('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
  

    public function destroy($request)
    {
        $post = Post::where('id', $request->input('id'))->first();
        if ($post) {
            $path = str_replace('storage', 'public', $post->image);
            Storage::delete($path);
            $post->delete();
            return true;
        }

        return false;
    }
    //End admin
    
    // Bài viết mới nhất
    public function postnew()
    {
        return Post::OrderBy('id', 'desc')->limit('3')->get();
    }

    // public function searchpost()
    // {
    //     $tukhoa = $_GET['tukhoa'];
    //     return Post::where('title', 'LIKE', '%' .$tukhoa. '%')
    //     ->OrWhere('description', 'LIKE', '%' .$tukhoa. '%')
    //     ->get();
    // }
    // public function search(Request $request)
    // {
    //     $search = $request->search ?? '';

    //     return Post::where('title', 'like', '%' .$search. '%');;
    // }

 
    // Danh sách bài viết
    public function PostList()
    {
        return Post::OrderBy('id', 'desc')->paginate(6);
    }

    // Chi tiết bài viết
    public function postdetail($id) {
        return Post::find($id);
    }

    //Danh mục bài viết
    public function show($id)
    {
        return Post::where('id', $id)
            ->where('active', 1)
            ->with('postCategory')
            ->firstOrFail();
    }

    // public function more($id)
    // {
    //     return Post::select('id', 'title', 'description', 'content', 'thumb', '	created_at')
    //         ->where('active', 1)
    //         ->orderByDesc('id')
    //         ->limit(8)
    //         ->get();
    // }

}
