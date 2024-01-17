<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDepController;
use App\Http\Controllers\AdminEmailController;
use App\Http\Controllers\PcNameController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ViewHomeController::class, 'index'])->name('viewhome');
Route::get('/search', [ViewHomeController::class, 'search'])->name('search');
//admin
// Auth::routes();
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'postLoginAdmin'])->name('postLoginAdmin');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'roles' => AdminRoleController::class,
        'users' => AdminUserController::class,
        'deps' => AdminDepController::class,
        'emails' => AdminEmailController::class,
    ]);
    Route::prefix('email')->group(function(){
        Route::post('/update-status',[AdminEmailController::class,'updateStatus'])->name('emails.status');
        Route::get('/search', [AdminEmailController::class,'searchEmail'])->name('emails.search');
        Route::get('/search_pcname', [AdminEmailController::class,'searchPcname'])->name('emails.search_pcname');
        Route::get('/search_ip', [AdminEmailController::class,'searchIp'])->name('emails.search_ip');
    });
    Route::post('deps/update-status',[AdminDepController::class, 'updateStatus'])->name('deps.status');
    Route::prefix('pcname')->group(function(){
        Route::get('/',[PcNameController::class,'index'])->name('pcnames.index');
        Route::get('/show/{id}',[PcNameController::class , 'show'])->name('pcnames.show');
        Route::get('/create',[PCNameController::class,'create'])->name('pcnames.create');
        Route::post('/store',[PcNameController::class,'store'])->name('pcnames.store');
        Route::get('/edit/{id}',[PcNameController::class,'edit'])->name('pcnames.edit');
        Route::post('/update/{id}',[PcNameController::class,'update'])->name('pcnames.update');
        Route::get('/delete/{id}',[PcNameController::class, 'delete'])->name('pcnames.delete');
        Route::get('/addimport',[PcNameController::class, 'addImport'])->name('pcnames.addimport');
        Route::post('/import-pcname',[PcNameController::class, 'import'])->name('pcnames.import');
        Route::get('/export', [PcNameController::class, 'export'])->name('pcnames.export');
        Route::get('/search', [PcNameController::class,'search'])->name('pcnames.search');
    });
});
