<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/post', [HomeController::class, 'post'])->name('post');
    Route::get('/post/{slug}', [HomeController::class, 'post_detail'])->name('post.detail');
    Route::get('/proyek', [HomeController::class, 'proyek'])->name('proyek');
    Route::get('/about-me', [HomeController::class, 'tentangKami'])->name('about');
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/tentang-kami', [DashboardController::class, 'about'])->name('tentang.kami');
    Route::patch('/tentang-kami/update', [DashboardController::class, 'aboutUpdate'])->name('tentang.kami.update');

    // Post
    Route::get('/postingan', [PostController::class, 'index'])->name('post.index');
    Route::get('/postingan/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/postingan/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/postingan/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/postingan/{slug}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/postingan/{slug}/delete', [PostController::class, 'destroy'])->name('post.delete');

    // Project
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/project/{id}/update', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}/delete', [ProjectController::class, 'destroy'])->name('project.delete');

    // Kelola User
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
});


// Route::get('/clear-cache', function () {
//     Artisan::call('cache:clear');
//     return 'Application cache has been cleared';
// });

// Route::get('/route-cache', function () {
//     Artisan::call('route:cache');
//     return 'Routes cache has been cleared';
// });

// Route::get('/config-cache', function () {
//     Artisan::call('config:cache');
//     return 'Config cache has been cleared';
// });

// Route::get('/view-clear', function () {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });

// Route::get('/clear-optimize', function () {
//     Artisan::call('optimize:clear');
//     return 'Application optimize has been cleared';
// });
