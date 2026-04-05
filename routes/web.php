<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserBorrowingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
    });
});

Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth', 'multirole:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/a/dashboard', 'dashboard')->name('admin.dashboard');
    });


    Route::controller(BookController::class)->group(function () {
        Route::get('/book', 'books')->name('admin.books');
        Route::get('/book/a/{id}/detail', 'detail')->name('admin.detailBook');
        Route::get('/book/form/add', 'addBook')->name('admin.addBook');
        Route::post('/book/form/post', 'store')->name('admin.storeBook');
        Route::get('/book/{id}/form/edit', 'edit')->name('admin.editBook');
        Route::put('/book/{id}/form/update', 'update')->name('admin.updateBook');
        Route::delete('/book/{id}/delete', 'delete')->name('admin.deleteBook');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'categories')->name('admin.categories');
        Route::get('/category/form/add', 'addCategory')->name('admin.addCategory');
        Route::post('/category/form/post', 'store')->name('admin.storeCategory');
        Route::get('/category/{id}/form/edit', 'edit')->name('admin.editCategory');
        Route::put('/category/{id}/form/update', 'update')->name('admin.updateCategory');
        Route::delete('/category/{id}/delete', 'delete')->name('admin.deleteCategory');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/user', 'users')->name('admin.users');
        Route::get('/user/form/add', 'addUser')->name('admin.addUser');
        Route::post('/user/form/post', 'store')->name('admin.storeUser');
        Route::get('/user/{id}/form/edit', 'edit')->name('admin.editUser');
        Route::put('/user/{id}/form/update', 'update')->name('admin.updateUser');
        Route::delete('/user/{id}/delete', 'delete')->name('admin.deleteUser');
    });

    Route::controller(BorrowingController::class)->group(function () {
        Route::get('/a/borrows', 'adminBorrows')->name('admin.borrows');
        Route::put('/a/borrows/{id}/confirm', 'confirm')->name('admin.borrowings.confirm');
        Route::put('/a/borrowed/{id}/returned', 'returnBook')->name('admin.borrowings.returned');
    });
});



Route::middleware(['auth', 'multirole:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/u/dashboard', 'dashboard')->name('user.dashboard');

        Route::get('/book/u/{id}/detail', 'bookDetail')->name('user.bookDetail');
        Route::get('/book/{id}/addToCart', 'addToCart')->name('user.addToCart');

        Route::get('/cart', 'cart')->name('user.cart');
        Route::delete('/cart/{id}/remove', 'removeCartItem')->name('user.cartRemove');
    });

    Route::controller(UserBorrowingController::class)->group(function () {
        Route::get('/u/borrows', 'borrows')->name('user.borrows');
        Route::post('/borrows/store', 'borrowStore')->name('user.borrowStore');
    });
});
