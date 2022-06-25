<?php


namespace App\Http\Services\Product;


use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;

class ProductService
{
    // List đồ uống
    public function showlist()
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->paginate(12);
    } 
    public function showRating()
    {
        $id = ProductComment::select('id');
        return ProductComment::whereIn('product_id', $id)->get();
    }
    // Chi tiết đồ uống
    public function showdetail($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('productCategory')
            ->firstOrFail();
    }
    // List Đồ uống liên quan
    public function relatedProduct($id)
    {
        $product = Product::where('id', $id)
        ->where('active', 1)
        ->with('productCategory')
        ->firstOrFail();
        return Product::where('cat_id', $product->cat_id)->limit(4)->whereNotIn('id', [$id])->get();
    }

    // List Đồ uống mới nhất
    public function newProduct()
    {
        return Product::OrderBy('id', 'desc')->limit('4')->get();
    }

    public function minprice() {
        return Product::min('price_sale');
    }
    // menu cat
    public function cat1Product() {
        $product = 7; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
    public function cat2Product() {
        // $product = Product::where('id', $id)
        // ->where('active', 1)
        // ->with('productCategory')
        // ->firstOrFail();
        $product = 5;
        return Product::where('cat_id', $product)->limit(4)->get();
    }

    // public function more($id)
    // {
    //     return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
    //         ->where('active', 1)
    //         ->where('id', '!=', $id)
    //         ->orderByDesc('id')
    //         ->limit(8)
    //         ->get();
    // }






    public function cat1() {
        // $product = Product::where('id', $id)
        // ->where('active', 1)
        // ->with('productCategory')
        // ->firstOrFail();
        $product = 5;
        return Product::where('cat_id', $product)->limit(4)->get();
    }
    
    // tận nơi
    public function cat2() {
        $product = 7; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
    public function cat3() {
        $product = 8; //29
        return Product::where('cat_id', $product)->limit(4)->get();
    }
}
