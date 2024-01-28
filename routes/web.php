<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', fn() => redirect()->route('admin.home'))->name('home');

// Route::get('post', [PostController::class, 'index'])->name('post.index');
// Route::get('post/create', [PostController::class, 'create']);
// Route::post('post', [PostController::class, 'store'])->name('post.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
// Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Route::post('post/deactivate', [PostController::class, 'deactivate'])->name('post.deactivate');
    Route::resource('post', PostController::class);

    Route::resource('user', UserController::class);

    Route::resource('event', EventController::class);

    Route::resource('meeting', MeetingController::class);

    Route::resource('role', RoleController::class);
});
