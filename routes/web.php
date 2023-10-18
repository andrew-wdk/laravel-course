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
    $validated = $request->validate(($rules = ['name' => ['required', 'in:micheal,mina,bisho,marina,sandra,roufeail,andrew']]), ($params = [
        'messages' => [
            'name.in' => 'Your name is not in the list of participants.',
        ],
    ]));
    
    $receivers = Cache::get('receivers');

    if ($receivers == null) {
        Cache::set('receivers', $names);
        $receivers = $names;
    }

    do {
        shuffle($receivers);
        $receiver = $receivers[0];
    } while($receiver == $validated['name']);

    $receivers = array_diff($receivers, [$receiver]);

    Cache::set('receivers', $receivers);

    return $receiver;
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
