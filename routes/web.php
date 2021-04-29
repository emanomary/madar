<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\HomePageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/******************************* Site Routes *******************************/

    Route::get('/', [HomePageController::class,'index'])->name('site.index');

    Route::get('categoryNews/{id}', [HomePageController::class,'categoryNews'])->name('site.categoryNews');

    Route::get('showNew/{slug}', [HomePageController::class,'showNew'])->name('site.showNew');

    Route::get('contactUs', [ContactUsController::class,'contactUs'])->name('site.contactUs');

    Route::post('contactUs/store', [ContactUsController::class,'store'])->name('site.contactUs.store');

/******************************* Admin Routes *******************************/
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //logout route
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Users Routes
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UserController::class, 'index'])->name('admin.users.index')->middleware('can:users');

        Route::get('create', [UserController::class, 'create'])->name('admin.users.create')->middleware('can:users');

        Route::post('store', [UserController::class, 'store'])->name('admin.users.store')->middleware('can:users');

        Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit')->middleware('can:users');

        Route::put('update/{id}', [UserController::class, 'update'])->name('admin.users.update')->middleware('can:users');

        Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy')->middleware('can:users');

        Route::get('editProfile', [UserController::class, 'editProfile'])->name('admin.users.editProfile')->middleware('can:profile');

        Route::put('updateProfile/{id}', [UserController::class, 'updateProfile'])->name('admin.users.updateProfile')->middleware('can:profile');

        Route::get('getPermissions/{id}', [UserController::class, 'getPermissions']);
    });

    //Setting Routes
    Route::group(['prefix' => 'settings','middleware'=>'can:settings'], function () {

        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');

        Route::get('edit/{id}', [SettingController::class, 'edit'])->name('admin.settings.edit');

        Route::put('update/{id}', [SettingController::class, 'update'])->name('admin.settings.update');
    });

    //Categories Routes
    Route::group(['prefix' => 'categories','middleware'=>'can:categories'], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');

        Route::get('create', [CategoryController::class, 'create'])->name('admin.categories.create');

        Route::post('store', [CategoryController::class, 'store'])->name('admin.categories.store');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');

        Route::put('update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    //Categories Routes
    Route::group(['prefix' => 'news','middleware'=>'can:news'], function () {

        Route::get('/', [NewController::class, 'index'])->name('admin.news.index');

        Route::get('create', [NewController::class, 'create'])->name('admin.news.create');

        Route::post('store', [NewController::class, 'store'])->name('admin.news.store');

        Route::get('edit/{id}', [NewController::class, 'edit'])->name('admin.news.edit');

        Route::put('update/{id}', [NewController::class, 'update'])->name('admin.news.update');

        Route::delete('destroy/{id}', [NewController::class, 'destroy'])->name('admin.news.destroy');
    });

    //Videos Routes
    Route::group(['prefix' => 'videos','middleware'=>'can:videos'], function () {

        Route::get('/', [VideoController::class, 'index'])->name('admin.videos.index');

        Route::get('create', [VideoController::class, 'create'])->name('admin.videos.create');

        Route::post('store', [VideoController::class, 'store'])->name('admin.videos.store');

        Route::get('edit/{id}', [VideoController::class, 'edit'])->name('admin.videos.edit');

        Route::put('update/{id}', [VideoController::class, 'update'])->name('admin.videos.update');

        Route::delete('destroy/{id}', [VideoController::class, 'destroy'])->name('admin.videos.destroy');
    });

    //Permissions Routes
    Route::group(['prefix' => 'permissions','middleware'=>'can:permissions'], function () {

        Route::get('/', [PermissionController::class, 'index'])->name('admin.permissions.index');
    });

    //Roles Routes
    Route::group(['prefix' => 'roles','middleware'=>'can:roles'], function () {

        Route::get('/', [RoleController::class, 'index'])->name('admin.roles.index');

        Route::get('create', [RoleController::class, 'create'])->name('admin.roles.create');

        Route::post('store', [RoleController::class, 'store'])->name('admin.roles.store');

        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('admin.roles.edit');

        Route::put('update/{id}', [RoleController::class, 'update'])->name('admin.roles.update');

        Route::delete('destroy/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    });

    //Roles Routes
    Route::group(['prefix' => 'messages','middleware'=>'can:messages'], function () {

        Route::get('/', [ContactUsController::class, 'messages'])->name('admin.messages.index');

        Route::delete('destroy/{id}', [ContactUsController::class, 'destroy'])->name('admin.messages.destroy');

        Route::get('show/{id}', [ContactUsController::class, 'show'])->name('admin.messages.show');
    });
});
/******************************* End Admin Routes *******************************/
