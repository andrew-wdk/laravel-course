<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Http\Request;
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

Route::get('/login', function() { return 'comming-soon';});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('post', [PostController::class, 'index']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::post('post', [PostController::class, 'store'])->name('post.store');

Route::resource('post', PostController::class);

Route::view('user/create', 'users.create');

Route::view('event/create', 'admin.event.create', [
    'users' => ['roufeail', 'marina', 'micheal', 'andrew']
]);
Route::view('user/list', 'users.index');
