<?php

use App\Events\NotificationMessage;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Home\AddressController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CommentController as HomeCommentController;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\FaqController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\PostController as HomePostController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\QuestionController as HomeQuestionController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Home\WishListController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Tags\TagControll;
use App\Http\Livewire\Home\Cart\ShowCart;
use App\Http\Livewire\Home\ProductsList;
use App\Models\Question;
use Illuminate\Support\Facades\Session;

//fortify routes
require_once __DIR__.'/fortify.php';
//admin routes
Route::prefix('Admin-panel/managment')->name('admin.')->middleware(['auth', 'has_role', 'has_free_plan'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('brands',         BrandController::class)->middleware('permission:brands');
    Route::resource('attributes',     AttributeController::class)->except(['show', 'destroy'])->middleware('permission:attributes');
    Route::post('/categories/order', [CategoryController::class, 'saveOrder'])->name('category.order');
    Route::resource('categories',       CategoryController::class)->middleware('permission:categories');
    Route::resource('banners',          BannerController::class)->except(['show', 'destroy'])->middleware('permission:banners');
    Route::resource('services',         ServiceController::class)->except(['show'])->middleware('permission:services');
    Route::resource('posts',            PostController::class)->except('show')->middleware('permission:posts');
    Route::resource('comments',         CommentController::class)->middleware('permission:comments');
    Route::resource('questions',         QuestionController::class)->middleware('permission:questions');
    Route::resource('coupons',          CouponController::class)->middleware('permission:coupons');
    Route::resource('products',         ProductController::class)->middleware('permission:products');
    Route::resource('orders',           OrderController::class)->middleware('permission:orders');
    Route::resource('transactions',     TransactionController::class)->middleware('permission:transactions');
    Route::resource('users',            UserController::class)->only('index', 'edit', 'update')->middleware('permission:users');
    Route::resource('roles',   RoleController::class)->except('show')->middleware('permission:roles');
    Route::view('permissions', 'admin.page.permissions.index')->name('permissions')->middleware('permission:permissions');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::view('/user/password', 'admin.page.auth.change-password')->name('profile.change-pass');

    Route::view('/settings', 'admin.page.settings.setting')->name('settings.show')->middleware('permission:settings');
    Route::get('tags/create',                         [TagControll::class, "createTag"])->name('tags.create')->middleware('permission:tags');
    Route::get('/category-attributes/{category}',     [CategoryController::class, 'getCategoryAttributes']);
    Route::get('/products/{product}/images-edit',     [ImageController::class, 'edit'])->name('products.images.edit');

    // Edit Product Category
    Route::get('/products/{product}/category-edit',   [ProductController::class, 'editCategory'])->name('products.category.edit');
    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('products.category.update');

    //image routes
    Route::post('/upl',       [ProductController::class, 'uploadImage'])->name('uploade');
    Route::post('/del',       [ProductController::class, 'deleteImage'])->name('del');
    Route::post('/editupl',   [ImageController::class, 'edit_uploadImage'])->name('edit_uploade');
    Route::post('/editdel',   [ImageController::class, 'edit_deleteImage'])->name('edit_del');
    Route::post('/add_image', [ImageController::class, 'setPrimary'])->name('product.images.add');
});
//end

//admin auth
Route::view('admin/login', 'admin.page.auth.login')->middleware('guest')->name('admin.login');

// home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

Route::get('/products/{product:slug}', [HomeProductController::class, 'show'])->name('home.products.show');

Route::get('/search/{slug?}', ProductsList::class)->name('home.products.search');
Route::get('/main/{slug}', ProductsList::class)->name('home.products.index');

//comments
Route::get('home/question/{product}', [HomeCommentController::class, 'create'])->name('home.comments.index');
Route::post('/comments/{product}', [HomeCommentController::class, 'store'])->name('home.comments.store');
Route::post('/reply/store', [HomeCommentController::class, 'replyStore'])->name('reply.add');
Route::post('/postcomments/{post}', [HomeCommentController::class, 'poststore'])->name('home.comments.poststore');

//questions
Route::post('/question/{product}', [HomeQuestionController::class, 'store'])->name('home.questions.store');
Route::post('/question/reply/store', [HomeQuestionController::class, 'replyStore'])->name('questions.reply.add');

// otp auth
Route::post('/auth/check', [OtpController::class, 'authenticate'])->name('authenticate');
Route::post('/otp/verify', [OtpController::class, 'checkVerificationCode'])->name('otp.verify');
Route::post('/otp/resend', [OtpController::class, 'resendVerificationCode'])->name('otp.resend');
Route::post('/otp/reset-password', [OtpController::class, 'resetPassword'])->name('otp.resetPassword');
Route::post('/otp/alter-phone', [OtpController::class, 'alterPhone'])->middleware('auth')->name('phone.update');
Route::post('/otp/verfiy-phone', [OtpController::class, 'verfiyPhone'])->middleware('auth')->name('phone.verify');
// end otp auth

Route::get('/assets/ajax', function () {
    return view('home.partial.login');
});

Route::prefix('profile')->name('home.')->middleware('auth')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('user_profile');
    Route::get('/editProfile', [UserProfileController::class, 'editProfile'])->name('user_profile.edit');
    Route::post('/forgot-password', [UserProfileController::class, 'forgetPassword'])->name('password.email');
    Route::get('/wishlist', [WishListController::class, 'usersProfileIndex'])->name('profile.wishlist.index');
    Route::get('/add-to-wishlist/{product:id}', [WishListController::class, 'add'])->name('home.wishlist.add');
    Route::get('/addreses',  [AddressController::class, 'index'])->name('addreses.index');
    Route::get('/addreses/create',  [AddressController::class, 'create'])->name('addreses.create');
    Route::post('/addreses', [AddressController::class, 'store'])->name('addreses.store');
    Route::get('/addreses/{address}', [AddressController::class, 'edit'])->name('addreses.edit');
    Route::put('/addreses/{address}', [AddressController::class, 'update'])->name('addreses.update');
    Route::get('/addreses/delete/{address}', [AddressController::class, 'destroy'])->name('addreses.destroy');
    Route::get('/orders', [UserProfileController::class, 'orderList'])->name('user_profile.ordersList');
    Route::get('/orders/{order}', [UserProfileController::class, 'order'])->name('user_profile.orders');
    Route::get('/commentsList', [UserProfileController::class, 'commentsList'])->name('user_profile.commentsList');
});



//user route


Route::get('/add-to-compare/{product:id}', [CompareController::class, 'add'])->name('home.compare.add');

Route::get('/compare', [CompareController::class, 'index'])->name('home.compare.index');
Route::get('/remove-from-compare/{product}', [CompareController::class, 'remove'])->name('home.compare.remove');

//cart
Route::post('/add-to-cart', [CartController::class, 'add'])->name('home.cart.add');

Route::get('/cart', ShowCart::class)->name('home.cart.index');

Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');

Route::get('/checkout', [CartController::class, 'checkout'])->name('home.orders.checkout')->middleware('auth');

Route::post('/payment', [PaymentController::class, 'payment'])->name('home.payment');

Route::get('/post/{post:slug}', [HomePostController::class, 'show'])->name('home.posts.show');
Route::get('/post', [HomePostController::class, 'index'])->name('home.posts.index');

Route::get('/post/list/{post:category}', [HomePostController::class, 'list'])->name('home.posts.list');

Route::get('/payment-verify/{gatewayName}', [PaymentController::class, 'paymentVerify'])->name('home.payment_verify');


Route::get('/get-province-cities-list', [AddressController::class, 'getProvinceCitiesList']);

//coupon
Route::post('/checkcoupon', [PaymentController::class, 'checkCoupon'])->name('home.orders.checkcoupon')->middleware('auth');

//faq
Route::get('/faq' , [FaqController::class , 'index'] )->name('faq');
Route::get('/privacy' , [FaqController::class , 'privacy'] )->name('privacy');
Route::get('/rules' , [FaqController::class , 'rules'] )->name('ruls');

Route::get('/test', function () {

} );