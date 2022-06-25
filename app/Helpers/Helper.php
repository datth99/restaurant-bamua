<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Helper
{

    public static function active($active = 0): string {
        return $active == 0 ? '<span class="badge bg-danger">Đang ẩn</span>'
            : '<span class="badge bg-success">Hiển thị </span>';
    }
}