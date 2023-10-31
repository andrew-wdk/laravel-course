 <?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

Route::get('secret-santa', function () {
    return view('secret-santa');
});

Route::post('secret-santa', function (Request $request) {
    $names = ['micheal', 'mina', 'bisho', 'marina', 'sandra', 'roufeail', 'andrew'];
    if(!in_array($request->name, $names)) {
        return "your name is not in the list!";
    }
    ['andrew' => 'roufeail'];
    $selected = Cache::get('selected') ?? [];
    if(in_array($request->name, array_keys($selected))) {
        return $selected[$request->name];
    }
    $receivers = array_diff($names, $selected);
    do {
        shuffle($receivers);
        $receiver = $receivers[0];
    } while($receiver == $request->name);
    $selected[$request->name] = $receiver;
    Cache::set('selected', $selected);
    return $receiver;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
