<?php


namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getCat()
    {
        return ProductCategory::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
         $isValidPrice = $this->isValidPrice($request);


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $path = public_path().'/uploads';
            $file->move($path,$file_name);
            $thumb = '/uploads/'.$file_name;
        } else{
            $data['thumb'] = 'no-img.jpg';
        }

         $data = [
             'name' => $request->name,
             'description' => $request->description,
             'content' => $request->content,
             'cat_id' => $request->cat_id,
             'price' => $request->price,
             'price_sale' => $request->price_sale,
             'active' => $request->active,
             'thumb' => $thumb
         ];


        try {
            $request->except('_token');
            Product::create($data);
            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::with('productcategory')
            ->orderByDesc('id')->paginate(8);
    }


    public function update($request, $id)
    {

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->cat_id = $request->cat_id;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale;
        $product->active = $request->active;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $path = public_path().'/uploads';
            $file->move($path,$file_name);
            $thumb = '/uploads/'.$file_name;
            $product->thumb = $thumb;
        }

        try {
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
