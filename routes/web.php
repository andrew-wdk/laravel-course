<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('post/create', 'admin.post.create', [
    'users' => ['roufeail', 'marina', 'micheal', 'andrew']
]);

Route::view('post', 'admin.post.index', [
    'posts' => [
        json_decode(json_encode(['title' => 'test', 'user' => 'andrew', 'type' => 'important', 'status' => 'active', 'publish_at' => null])),
        json_decode(json_encode(['title' => 'test', 'user' => 'andrew', 'type' => 'important', 'status' => 'active', 'publish_at' => '2023-10-29 13:00']))
    ]
]);
