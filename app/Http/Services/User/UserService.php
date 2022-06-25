<?php


namespace App\Http\Services\User;


use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserService
{
    public function get()
    {
        return Admin::orderByDesc('id')->paginate(8);
    }

    public function update($request, $admin)
    {
        try {
            $admin->fill($request->input());
            $admin->save();
            Session::flash('success', 'Cập nhật trạng thái thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $admin = Admin::where('id', $id)->first();
        if ($admin) {
            return Admin::where('id', $id)->delete();
        }

        return false;
    }

}
