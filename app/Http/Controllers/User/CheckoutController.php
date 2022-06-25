<?php

namespace App\Http\Controllers\User;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{

    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {

        $products = $this->cartService->getProduct();

        return view('user.checkout.index', [
            'title' => 'Giỏ Hàng - Mì Quảng Bà Mua',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function addOrder(Request $request)
    {
        if ($request->payment_type == 'pay_later') {
            //01. Thêm đơn hàng
            $carts = Session::get('carts');
            $customer = Customer::create($request->all());
            //02. Thêm chi tiết đơn hàng
            $this->infoProductCart($carts, $customer->id);
        }
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }

        return Cart::insert($data);
    }


    public function addOrders(Request $request)
    {
          // Them don hang 
          $carts = Session::get('carts');
          $customer = Customer::create($request->all());

          // them chi tiet don hang
          $productId = array_keys($carts);
          $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
              ->where('active', 1)
              ->whereIn('id', $productId)
              ->get();

          foreach ($products as $product) {
              $data = [
                  'customer_id' => $customer->id,
                  'product_id' => $product->id,
                  'pty'   => $carts[$product->id],
                  'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
              ];
              Cart::insert($data);
          }

        if ($request->payment_type == 'pay_later') {
            //04 Xoa gio hang
            Cart::destroy($customer);
            //05 tra ve kq
            return redirect('thanh-toan/thanh-cong')->with('noti', 'done');
        } 

        else {
            return "online payment";
        }
    }

    //Done form
    public function thanhtoanthanhcong() {
        $title = session('notificution');
        $title = 'Thanh toán thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }

    public function datbanthanhcong() {
        $title = session('notificution');
        $title = 'Đặt bàn thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }

    public function lienhethanhcong() {
        $title = session('notificution');
        $title = 'Liên hệ thành công';
        return view('user.confirm.thanhtoanok', compact('title'));
    }
    
}
