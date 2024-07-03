<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'check.active.region'])->group(function () {
    Route::get('admin/index', function () {
        return view('admin/index');
    })->name('index');
    Route::prefix('admin')->group(function (){
        Route::prefix('index')->group(function (){
            Route::prefix('introductions')->group(function (){
                Route::get('create', [IntroductionController::class, 'create'])->name('introductions.create');
                Route::post('/', [IntroductionController::class, 'store'])->name('introductions.store');
                Route::get('showall', [IntroductionController::class, 'showall'])->name('introductions.showall');
                Route::get('{introduction}/showdetail', [IntroductionController::class, 'show'])->name('introductions.showdetail');
                Route::get('{introduction}/edit', [IntroductionController::class, 'edit'])->name('introductions.edit');
                Route::put('{introduction}/edit', [IntroductionController::class, 'update'])->name('introductions.update');
                Route::delete('{introduction}', [IntroductionController::class, 'destroy'])->name('introductions.destroy');
                Route::get('BrowserIntroduction', [IntroductionController::class, 'Browser'])->name('introductions.BrowserIntroduction');
                Route::post('{id}/approve', [IntroductionController::class, 'approve'])->name('introductions.approve');
                Route::patch('{id}/reject', [IntroductionController::class, 'reject'])->name('introductions.reject');
            });
            Route::prefix('EventManager')->group(function (){
                Route::get('CreateEvent', [EventController::class, 'CreateEvent'])->name('EventManager.CreateEvent');
                Route::post('/', [EventController::class, 'store'])->name('EventManager.store');
                Route::get('ShowallEvent', [EventController::class, 'ShowallEvent'])->name('EventManager.ShowallEvent');
                Route::get('{event}/ShowDetailEvent', [EventController::class, 'ShowEvent'])->name('EventManager.ShowDetailEvent');
                Route::get('{event}/EditEvent', [EventController::class, 'EditEvent'])->name('EventManager.EditEvent');
                Route::put('{event}/EditEvent', [EventController::class, 'UpdateEvent'])->name('EventManager.UpdateEvent');
                Route::delete('{event}', [EventController::class, 'DestroyEvent'])->name('EventManager.DestroyEvent');
                Route::get('BrowserEvent', [EventController::class, 'BrowserEvent'])->name('EventManager.BrowserEvent');
                Route::post('{id}/ApproveEvent', [EventController::class, 'ApproveEvent'])->name('EventManager.ApproveEvent');
                Route::patch('{id}/RejectEvent', [EventController::class, 'RejectEvent'])->name('EventManager.RejectEvent');
            });
            Route::prefix('ProductManager')->group(function (){
                Route::prefix('CategoryProduct')->group(function (){
                    Route::get('CreateCategory', [CategoryController::class, 'CreateCategory'])->name('CategoryProduct.CreateCategory');
                    Route::post('/', [CategoryController::class, 'store'])->name('CategoryProduct.store');
                    Route::get('ShowCategory', [CategoryController::class, 'ShowCategory'])->name('CategoryProduct.ShowCategory');
                    Route::get('{category}/EditCategory', [CategoryController::class, 'EditCategory'])->name('CategoryProduct.EditCategory');
                    Route::put('{category}/EditCategory', [CategoryController::class, 'UpdateCategory'])->name('CategoryProduct.UpdateCategory');
                    Route::delete('{category}', [CategoryController::class, 'DestroyCategory'])->name('CategoryProduct.DestroyCategory');
                    Route::get('BrowserCategory', [CategoryController::class, 'BrowserCategory'])->name('CategoryProduct.BrowserCategory');
                    Route::post('{id}/ApproveCategory', [CategoryController::class, 'ApproveCategory'])->name('CategoryProduct.ApproveCategory');
                    Route::patch('{id}/RejectCategory', [CategoryController::class, 'RejectCategory'])->name('CategoryProduct.RejectCategory');
                });
                Route::prefix('Products')->group(function (){
                    Route::get('CreateProduct', [ProductController::class, 'CreateProduct'])->name('Products.CreateProduct');
                    Route::post('/', [ProductController::class, 'store'])->name('Products.store');
                    Route::get('ShowProduct', [ProductController::class, 'ShowProduct'])->name('Products.ShowProduct');
                    Route::get('{product}/ShowProductDetail', [ProductController::class, 'ShowProductDetail'])->name('Products.ShowProductDetail');
                    Route::get('{product}/EditProduct', [ProductController::class, 'EditProduct'])->name('Products.EditProduct');
                    Route::put('{product}/UpdateProduct', [ProductController::class, 'UpdateProduct'])->name('Products.UpdateProduct');
                    Route::delete('{product}', [ProductController::class, 'DestroyProduct'])->name('Products.DestroyProduct');
                    Route::get('BrowserProduct', [ProductController::class, 'BrowserProduct'])->name('Products.BrowserProduct');
                    Route::post('{id}/ApproveProduct', [ProductController::class, 'ApproveProduct'])->name('Products.ApproveProduct');
                    Route::patch('{id}/RejectProduct', [ProductController::class, 'RejectProduct'])->name('Products.RejectProduct');
                });
            });

        });
        Route::prefix('AccountManager')->group(function (){
            Route::get('/ShowAccount', [UserController::class, 'index'])->name('AccountManager.ShowAccount');
            Route::get('/CreateAccount', [UserController::class, 'create'])->name('AccountManager.CreateAccount');
            Route::post('/users', [UserController::class, 'store'])->name('AccountManager.store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('AccountManager.EditAccount');
            Route::put('/{user}', [UserController::class, 'update'])->name('AccountManager.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('AccountManager.Destroy');
            Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('AccountManager.ShowProfile');
            Route::post('{id}/ApproveAccount', [IntroductionController::class, 'Approve'])->name('AccountManager.ApproveAccount');
        });
    });
});
Route::get('/', [HomeController::class, 'index']);
Route::get('pages/gioithieu/chitietGT/{id}', [HomeController::class, 'introduceDetail'])->name('IntroduceDetail');
Route::get('pages/sanpham/chitietSP/{id}', [HomeController::class, 'ProductDetail'])->name('ProductDetail');
Route::get('pages/tintuc/chitiettintuc/{id}', [HomeController::class, 'EventDetail'])->name('EventDetail');
Route::get('pages/sanpham', [HomeController::class, 'Product'])->name('Product');
Route::get('pages/gioithieu', [HomeController::class, 'Introduce'])->name('Introduce');
Route::get('pages/tintuc', [HomeController::class, 'Event'])->name('Event');
Route::get('pages/lienhe', [HomeController::class, 'Contact'])->name('Contact');
Route::post('/increment-click/{id}', [HomeController::class, 'incrementClick']);
Route::get('/featured-event', [HomeController::class, 'Event']);
Route::get('/featured-event', [HomeController::class, 'EventDetail']);
Route::get('/featured-event', [HomeController::class, 'Introduce']);
// Route::get('/featured-event', [HomeController::class, 'IntroductionDetail']);
