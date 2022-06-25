<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Auth\AuthenticatesUsers;




class LoginController extends Controller
{

    // use AuthenticatesUsers;

    protected $userSevice;
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(UserService $userSevice)
    {
        $this->userSevice = $userSevice;

        $this->middleware('guest')->except('logout');
    }


    // Thêm tk admin
    public function AddAdmin()
    {
        return view('Admin.account.addadmins', [
            'title' => 'Tạo tài khoản Quản trị'
        ]);
    }
    // xử lý Thêm tk admin
    public function postAddAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($user->id) {
            return redirect()->route('admin');
        }
        return redirect()->back();
    }


    //Quản lý User
    public function indexUser()
    {
        return view('admin.account.list', [
            'title' => 'Danh Sách người dùng',
            'users' => $this->userSevice->get()
        ]);
    }

    public function showUser(Admin $users)
    {
        return view('admin.account.edit', [
            'title' => 'Chỉnh Sửa user',
            'users' => $users
        ]);
    }

    public function updateUser(Request $request, Admin $admin)
    {

        $this->userSevice->update($request, $admin);

        return redirect('/admin/members/list');
    }

    public function destroyUser(Request $request)
    {
        $result = $this->userSevice->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa người dùng thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
    //End quan ly user

}
