<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use PhpParser\Node\Expr\Print_;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/gio-hang');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('user.carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function updatecart(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/gio-hang');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect()->back();
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
