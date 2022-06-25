<?php


namespace App\Http\Services\PostCategory;


use App\Models\PostCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostCategoryService
{
    public function show()
    {
        return PostCategory::select('name', 'id')->orderbyDesc('id')->get();
    }

    public function getAll()
    {
        return PostCategory::orderbyDesc('id')->paginate(5);
    }

    public function create($request)
    {
        try {
            PostCategory::create([
                'name' => (string)$request->input('name'),
                'active' => (string)$request->input('active')
            ]);

            Session::flash('success', 'Tạo Danh Mục Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $categorypost): bool
    {
        $categorypost->name = (string)$request->input('name');
        $categorypost->active = (string)$request->input('active');
        $categorypost->save(); 

        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $categorypost = PostCategory::where('id', $id)->first();
        if ($categorypost) {
            return PostCategory::where('id', $id)->delete();
        }

        return false;
    }


    public function getId($id)
    {
        return PostCategory::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getPost($categorypost, $request)
    {
        $query = $categorypost->posts()
            ->select('id', 'name', 'description', 'content', 'thumb')
            ->where('active', 1);

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }

    public function catPost()
    {
        return PostCategory::all();
    }
    
}
