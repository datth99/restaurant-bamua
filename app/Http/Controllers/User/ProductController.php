<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductComment;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    // Danh sách sp
    public function index(Request $request)
    {
        $categories = ProductCategory::where('active', 1)->get();
        $products = Product::where('active', 1)->paginate(8);
        $title = 'Thực đơn - Mì Quảng Bà Mua';
        return view('user.products.list', compact('products', 'categories', 'title'));
    }

    // Danh sách danh mục sp
    public function category($categoryName, Request $request)
    {
        $categories = ProductCategory::all();
        $categories = ProductCategory::where('active', 1)->get();
        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery();
        return view('user.products.list', compact('products', 'categories'));
    }

    // Chi tiết sp
    public function details($id = '', $slug = '')
    {
        $product = $this->productService->showdetail($id);
        $cmts = $this->productService->showRating();
        $dk = [
            ['active', '=', 1],['product_id', '=', $id]
        ];
        $productcmt = ProductComment::where($dk)->get();
        return view('user.products.details', [
            'title' => $product->name,
            'product' => $product,
            // 'products' => $productsMore,
            'repproduct' => $this->productService->relatedProduct($id),
            'cmts' => $cmts,
            'productcmt' => $productcmt
        ]);
    }

    public function postComment(Request $request, $id)
    {
        ProductComment::create($request->all());
        $product = Product::find($id);
        $product->total_number +=  $request->rating;
        $product->total_rating +=  1;
        $product->save();

        return redirect()->back()->with('success', 'Đăng bình luận sản phẩm thành công!');
    }
}
