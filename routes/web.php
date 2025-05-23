<?php

use App\Http\Middleware\CheckAdminLogin;
use App\Http\Middleware\CheckMemberLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\RecommendationController;
use App\Http\Controllers\Front\ChatboxController;
use App\Http\Controllers\Front\BlogDetailController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ContactController;

//front User
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/', function () {
    return view('front.index');
})->name('home');
Route::get('/get-current-user', [ChatboxController::class, 'getCurrentUser']);
Route::get('/get-chat-history', [ChatboxController::class, 'getChatHistory'])->middleware('auth');
Route::post('/ask', [ChatboxController::class, 'askQuestion'])->name('chatbox.ask');

// Ưu tiên route danh sách blog đứng trước
// Route danh sách blog
Route::prefix('blog')->group(function () {
    // Blog listing route
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');

    // Blog detail route - now accepts either ID or a title-based parameter
    Route::get('/{param}', [BlogController::class, 'show'])->name('blog.detail');
});
Route::get('/blog-detail', [BlogController::class, 'index'])->name('blog.detail.index');
Route::get('/blog-detail/{param}', [BlogDetailController::class, 'show'])->name('blog.detail.show');





Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index']
);
Route::prefix('shop')->group(function () {

Route::get('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'show']);

Route::post('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'postComment']);

Route::get('', [App\Http\Controllers\Front\ShopController::class, 'index']);

Route::get('category/{categoryName}', [App\Http\Controllers\Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
    Route::get('add', [\App\Http\Controllers\Front\CartController::class, 'add']);
    Route::get('/', [\App\Http\Controllers\Front\CartController::class, 'index']);
    Route::get('delete', [\App\Http\Controllers\Front\CartController::class, 'delete']);
    Route::get('destroy', [\App\Http\Controllers\Front\CartController::class, 'destroy']);
    Route::get('update', [\App\Http\Controllers\Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function () {
    Route::get('', [\App\Http\Controllers\Front\CheckOutController::class, 'index']);
    Route::post('', [\App\Http\Controllers\Front\CheckOutController::class, 'addOrder']);
    Route::get('/result',[\App\Http\Controllers\Front\CheckOutController::class, 'result']);
    Route::get('/vnPayCheck',[\App\Http\Controllers\Front\CheckOutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
   Route::get('login', [\App\Http\Controllers\Front\AccountController::class, 'login']);
    Route::post('login', [\App\Http\Controllers\Front\AccountController::class, 'checkLogin']);
    Route::get('logout', [\App\Http\Controllers\Front\AccountController::class, 'logout']);
    Route::get('register', [\App\Http\Controllers\Front\AccountController::class, 'register']);
    Route::post('register', [\App\Http\Controllers\Front\AccountController::class, 'postRegister']);

        Route::prefix('my-order')->middleware(CheckMemberLogin::class)->group(function(){
        Route::get('/',[\App\Http\Controllers\Front\AccountController::class, 'myOrderIndex']);
        Route::get('{id}',[\App\Http\Controllers\Front\AccountController::class, 'myOrderShow']);
    });
});
Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');


//Dashboard Admin

Route::prefix('admin')->middleware(CheckAdminLogin::class)->group(function () {
    Route::redirect('', 'admin/user');
   Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
    Route::resource('category',\App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('brand',\App\Http\Controllers\Admin\BrandController::class);
    Route::resource('product',\App\Http\Controllers\Admin\ProductController::class);
    Route::resource('product/{product_id}/image',\App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail',\App\Http\Controllers\Admin\ProductDetailController::class);
    Route::resource('order',\App\Http\Controllers\Admin\OrderController::class);

    Route::prefix('login')->group(function () {
       Route::get('',[\App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware(CheckAdminLogin::class);
       Route::post('',[\App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware(CheckAdminLogin::class);
   });
   Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class, 'logout']);
});
