<?php

//Use
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use GuzzleHttp\Middleware;
use PHPUnit\TextUI\XmlConfiguration\Group;
//End Use


// QUẢN TRỊ
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [Admin\MainController::class, 'index'])->name('admin');
        Route::get('/activeContact{contact}', [Admin\MainController::class, 'activeContact'])->name('admin.activeContact');
        Route::get('/activeRevervation{reservation}', [Admin\MainController::class, 'activeReservation'])->name('admin.activeReservation');

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [Admin\MenuController::class, 'create']);
            Route::post('add', [Admin\MenuController::class, 'store']);
            Route::get('list', [Admin\MenuController::class, 'index']);
            Route::get('edit/{menu}', [Admin\MenuController::class, 'show']);
            Route::post('edit/{menu}', [Admin\MenuController::class, 'update']);
            Route::DELETE('destroy', [Admin\MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [Admin\ProductController::class, 'create']);
            Route::post('add', [Admin\ProductController::class, 'store']);
            Route::get('list', [Admin\ProductController::class, 'index'])->name('products.list');
            Route::get('edit/{product}', [Admin\ProductController::class, 'show']);
            Route::post('edit/{product}', [Admin\ProductController::class, 'update']);
            Route::DELETE('destroy', [Admin\ProductController::class, 'destroy']);
        });

        #Product Category
        Route::prefix('productcategories')->group(function () {
            Route::get('add', [Admin\ProductCategoryController::class, 'create']);
            Route::post('add', [Admin\ProductCategoryController::class, 'store']);
            Route::get('list', [Admin\ProductCategoryController::class, 'index']);
            Route::get('edit/{productcategory}', [Admin\ProductCategoryController::class, 'show']);
            Route::post('edit/{productcategory}', [Admin\ProductCategoryController::class, 'update']);
            Route::DELETE('destroy', [Admin\ProductCategoryController::class, 'destroy']);
        });

        Route::prefix('productcomments')->group(function () {
            Route::get('/list', [Admin\ProductCommentController::class, 'listProductCmt']);
            Route::get('/lists{productcomment}', [Admin\ProductCommentController::class, 'activeCMT'])->name('activeCMT');
            Route::get('/list{productcomment}', [Admin\ProductCommentController::class, 'inactiveCmt'])->name('inactiveCMT');
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [Admin\SliderController::class, 'create']);
            Route::post('add', [Admin\SliderController::class, 'store']);
            Route::get('list', [Admin\SliderController::class, 'index']);
            Route::get('edit/{slider}', [Admin\SliderController::class, 'show']);
            Route::post('edit/{slider}', [Admin\SliderController::class, 'update']);
            Route::DELETE('destroy', [Admin\SliderController::class, 'destroy']);
        });

        #Gallary
        Route::prefix('galleries')->group(function () {
            Route::get('add', [Admin\GalleryController::class, 'create']);
            Route::post('add', [Admin\GalleryController::class, 'store']);
            Route::get('list', [Admin\GalleryController::class, 'index']);
            Route::get('edit/{gallery}', [Admin\GalleryController::class, 'show']);
            Route::post('edit/{gallery}', [Admin\GalleryController::class, 'update']);
            Route::DELETE('destroy', [Admin\GalleryController::class, 'destroy']);
        });


        #Post Category
        Route::prefix('postcategories')->group(function () {
            Route::get('add', [Admin\PostCategoryController::class, 'create']);
            Route::post('add', [Admin\PostCategoryController::class, 'store']);
            Route::get('list', [Admin\PostCategoryController::class, 'index']);
            Route::get('edit/{postcategory}', [Admin\PostCategoryController::class, 'show']);
            Route::post('edit/{postcategory}', [Admin\PostCategoryController::class, 'update']);
            Route::DELETE('destroy', [Admin\PostCategoryController::class, 'destroy']);
        });

        #Bài viết
        Route::prefix('posts')->group(function () {
            Route::get('add', [Admin\PostController::class, 'create']);
            Route::post('add', [Admin\PostController::class, 'store']);
            Route::get('list', [Admin\PostController::class, 'index']);
            Route::get('edit/{post}', [Admin\PostController::class, 'show']);
            Route::post('edit/{post}', [Admin\PostController::class, 'update']);
            Route::DELETE('destroy', [Admin\PostController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [Admin\UploadController::class, 'store']);

        #Quản lý hóa đơn
        Route::prefix('customers')->group(function () {
            Route::get('/', [Admin\CartController::class, 'index']);
            Route::get('/view/{customer}', [Admin\CartController::class, 'show']);
            Route::get('/active{customer}', [Admin\CartController::class, 'active'])->name('customer.active');
            Route::DELETE('/destroy', [Admin\CartController::class, 'destroy']);
        });

        #Bài viết giới thiệu
        Route::prefix('abouts')->group(function () {
            Route::get('list', [Admin\AboutUsController::class, 'index']);
            Route::get('edit/{about}', [Admin\AboutUsController::class, 'show']);
            Route::post('edit/{about}', [Admin\AboutUsController::class, 'update']);
        });

        #Thêm tài khoản quản trị
        Route::get('/add-admin', [User\LoginController::class, 'AddAdmins']);

        #Tài khoản người dùng
        Route::prefix('members')->group(function () {
            Route::get('/list', [Admin\LoginController::class, 'indexUser']);
            Route::get('/edit/{admin}', [Admin\LoginController::class, 'showUser']);
            Route::post('/edit/{admin}', [Admin\LoginController::class, 'updateUser']);
            Route::DELETE('/destroy', [Admin\LoginController::class, 'destroyUser']);
        });
    });
});
// HẾT QUẢN TRỊ

//NGƯỜI DÙNG
#Trang chủ
Route::get('/', [User\HomeController::class, 'index'])->name('home');

#Đồ uống
Route::prefix('thuc-don')->group(function () {
    Route::get('/', [User\ProductController::class, 'index']);
    Route::get('/{id}-{slug}', [User\ProductController::class, 'details']);
});

Route::prefix('gio-hang')->group(function () {
    Route::get('/', [User\CartController::class, 'show']);
    Route::post('/them-gio-hang', [User\CartController::class, 'index']);
    Route::post('/cap-nhat', [User\CartController::class, 'updatecart']);
    Route::get('/xoa/{id}', [User\CartController::class, 'remove']);
    Route::post('/carts', [User\CartController::class, 'addCart']);
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('thanh-toan')->group(function () {
        Route::get('/', [User\CheckoutController::class, 'index']);
        Route::post('/', [User\CheckoutController::class, 'addOrders']);
        Route::get('/thanh-cong', [User\CheckoutController::class, 'thanhtoanthanhcong']);
    });
    #Đánh giá sp
    Route::post('/danh-gia-{id}-{slug}', [User\ProductController::class, 'postComment']);

    #Đặt bàn
    Route::prefix('dat-ban')->group(function () {
        Route::get('/', [User\ReservationController::class, 'index']);
        Route::post('/', [User\ReservationController::class, 'postReservation']);
        Route::get('/thanh-cong', [User\CheckoutController::class, 'datbanthanhcong']);
    });

    #Liên hệ
    Route::prefix('lien-he')->group(function () {
        Route::get('/', [User\ContactController::class, 'index']);
        Route::post('/', [User\ContactController::class, 'postContact']);
        Route::get('/thanh-cong', [User\CheckoutController::class, 'lienhethanhcong']);
    });
});


#Blog
Route::prefix('blog')->group(function () {
    Route::get('/', [User\BlogController::class, 'index']);
    Route::get('/{id}-{slug}', [User\BlogController::class, 'detail']);

    Route::get('/{title}', [User\BlogController::class, 'category']);
});

#Giới thiệu
Route::prefix('gioi-thieu')->group(function () {
    Route::get('/', [User\AboutUsController::class, 'index']);
});

#Đăng nhập-Ký-Xuất user
Route::group(['namspace' => 'Auth'], function () {
    Route::get('dang-ky', [User\LoginController::class, 'getRegister'])->name('register');
    Route::post('dang-ky', [User\LoginController::class, 'postRegister']);
    Route::get('dang-nhap', [User\LoginController::class, 'getLogin'])->name('login');
    Route::post('dang-nhap', [User\LoginController::class, 'postLogin']);
    Route::get('/dang-xuat', [User\LoginController::class, 'LogOut']);
});
