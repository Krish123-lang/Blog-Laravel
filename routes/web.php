<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'auth_login'])->name('auth.auth_login');
Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'create_user'])->name('auth.create_user');
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('auth.verify');
Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('auth.forgot_password');
Route::post('forgot_password', [AuthController::class, 'forgot_password_reset'])->name('auth.forgot_password_reset');
Route::get('reset/{token}', [AuthController::class, 'reset'])->name('auth.reset');
Route::post('reset/{token}', [AuthController::class, 'post_reset'])->name('auth.post_reset');

Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
// Home
Route::get('/', [HomeController::class, 'home'])->name('home.home');
Route::get('about', [HomeController::class, 'about'])->name('home.about');
Route::get('team', [HomeController::class, 'team'])->name('home.team');
Route::get('gallery', [HomeController::class, 'gallery'])->name('home.gallery');
Route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('{slug}', [HomeController::class, 'blog_detail'])->name('blog.detail');

Route::group(['middleware' => AdminMiddleware::class], function () {

    Route::get('panel/user/list', [UserController::class, 'user_list'])->name('backend.user.list');
    Route::get('panel/user/add', [UserController::class, 'user_add'])->name('backend.user.add');
    Route::post('panel/user/add', [UserController::class, 'user_store'])->name('backend.user.store');
    Route::get('panel/user/edit/{id}', [UserController::class, 'user_edit'])->name('backend.user.edit');
    Route::put('panel/user/edit/{id}', [UserController::class, 'user_update'])->name('backend.user.update');
    Route::delete('panel/user/delete/{id}', [UserController::class, 'user_delete'])->name('backend.user.delete');

    // Category
    Route::get('panel/category/list', [CategoryController::class, 'category_list'])->name('backend.category.list');
    Route::get('panel/category/add', [CategoryController::class, 'category_add'])->name('backend.category.add');
    Route::post('panel/category/add', [CategoryController::class, 'category_store'])->name('backend.category.store');
    Route::get('panel/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('backend.category.edit');
    Route::put('panel/category/edit/{id}', [CategoryController::class, 'category_update'])->name('backend.category.update');
    Route::delete('panel/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('backend.category.delete');

    // Pages
    Route::get('panel/pages/list', [PagesController::class, 'pages_list'])->name('backend.pages.list');
    Route::get('panel/pages/add', [PagesController::class, 'pages_add'])->name('backend.pages.add');
    Route::post('panel/pages/add', [PagesController::class, 'pages_store'])->name('backend.pages.store');
    Route::get('panel/pages/edit/{id}', [PagesController::class, 'pages_edit'])->name('backend.pages.edit');
    Route::put('panel/pages/edit/{id}', [PagesController::class, 'pages_update'])->name('backend.pages.update');
    Route::delete('panel/pages/delete/{page}', [PagesController::class, 'pages_delete'])->name('backend.pages.delete');
});

Route::group(['middleware' => AuthMiddleware::class], function () {
    // Dashboard
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('backend.dashboard');

    // Blog
    Route::get('panel/blog/list', [BlogController::class, 'blog_list'])->name('backend.blog.list');
    Route::get('panel/blog/add', [BlogController::class, 'blog_add'])->name('backend.blog.add');
    Route::post('panel/blog/add', [BlogController::class, 'blog_store'])->name('backend.blog.store');
    Route::get('panel/blog/edit/{id}', [BlogController::class, 'blog_edit'])->name('backend.blog.edit');
    Route::put('panel/blog/edit/{id}', [BlogController::class, 'blog_update'])->name('backend.blog.update');
    Route::delete('panel/blog/delete/{id}', [BlogController::class, 'blog_delete'])->name('backend.blog.delete');

    Route::post('blog-comment-submit', [HomeController::class, 'BlogCommentSubmit'])->name('blog_comment_submit');
});
