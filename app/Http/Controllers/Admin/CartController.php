<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\About\AboutService;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    protected $cart;
    protected $about;
    public function __construct(CartService $cart, AboutService $about)
    {
        $this->cart = $cart;
        $this->about = $about;
    }

    public function index()
    {
        return view('admin.receipts.list', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        $abouts = $this->about->display();
        return view('admin.receipts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts,
            'abouts' => $abouts,
          
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->cart->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Hóa Đơn Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    // Trạng thái đơn hàng
    public function active($customer)
    {
        $transaction = Customer::find($customer);

        $transaction->status = Customer::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success',' Xu ly don hang thanh cong');
    }

    // Gửi mail hóa đơn
    public function postReservation(Request $request) 
    {
        Mail::send('user.mail.reservation', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
            'people' => $request->people,
            'time' => $request->time,
            'datepicker_field' => $request->datepicker_field,

        ], function($mail) use($request) {
          
        });
        return redirect()->back();
    }
    private function sendEmail($customer)
    {
        $email_to = $customer->email;

        Mail::send('user.checkout.email', compact('customer'), 
        function ($message) use ($customer) {
            $message->to('trungdao10a1@gmail.com', 'Nö Diary of');
            $message->from($customer->email);
            $message->subject('Đặt đồ uống');
        });
    }

   
    

}
