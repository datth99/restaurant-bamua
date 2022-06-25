<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    //View đăng ký
    public function getRegister() {
        return view('user.auth.register',[
            'title' => 'Đăng ký tài khoản - Mì Quảng Bà Mua',
        ]);
    }
    // Xử lý đăng ký
    public function postRegister(Request $request)
     {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
            'phone' => 'required',
            'name' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        // $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->active = 1;
        $user->level = 0;
        
        $user->save(); 
        if ($user->id) {
            return redirect()->route('login')->with('message', 'Đăng ký thành công');
        }
        return redirect()->back();
    }

    //View đăng nhập
    public function getLogin() {
        return view('user.auth.login',[
            'title' => 'Đăng nhập -  Mì Quảng Bà Mua',
        ]);
    }
    // Xử lý đăng nhập
    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ], $request->input('remember'))) {
            if (Auth::user()->level==1) {
                return redirect('admin')->with('message', 'Đăng nhập thành công');
            } else {
                return redirect()->back()->with('message', 'Đăng nhập thành công');
            }
        }

        Session::flash('error', 'Email hoặc mật khẩu không hợp lệ!');
        return redirect()->back();
    }
    
    // Đăng xuất
    public function LogOut() {
        Auth::logout();
        return redirect()->route('login');
    }

    // Login with
    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }


    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->facebook_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
    

    public function AddAdmins()
    {
        return view('Admin.account.addadmins', [
            'title' => 'Tạo tài khoản Quản trị '
        ]);
    }
}
