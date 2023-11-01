<?php

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

Route::view('post/create', 'admin.post.create', [
    'users' => ['roufeail', 'marina', 'micheal', 'andrew']
]);

Route::view('user/create', 'users.create');
Route::post('user/create', function(Request $request) {
    $input = implode(', ', $request->only('name', 'email', 'password'));
    DB::unprepared("INSERT INTO users (name, email, password) VALUES ('{$input->name}', '{$input->email}', '{$input->password}');");
    

    return redirect('/home');
});

Route::view('post', 'admin.post.index', [
    'posts' => [
        json_decode(json_encode(['title' => 'test', 'user' => 'andrew', 'type' => 'important', 'status' => 'active', 'publish_at' => null])),
        json_decode(json_encode(['title' => 'test', 'user' => 'andrew', 'type' => 'important', 'status' => 'active', 'publish_at' => '2023-10-29 13:00']))
    ]
]);
Route::view('user/list', 'users.index');