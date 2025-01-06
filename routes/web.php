<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
    return view('home');
})->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
 
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
 
    Route::get('/admin/pasiens', [PasienController::class, 'index'])->name('admin/pasiens');
    Route::get('/admin/pasiens/create', [PasienController::class, 'create'])->name('admin/pasiens/create');
    Route::post('/admin/pasiens/store', [PasienController::class, 'store'])->name('admin/pasiens/store');
    Route::get('/admin/pasiens/show/{id}', [PasienController::class, 'show'])->name('admin/pasiens/show');
    Route::get('/admin/pasiens/edit/{id}', [PasienController::class, 'edit'])->name('admin/pasiens/edit');
    Route::put('/admin/pasiens/edit/{id}', [PasienController::class, 'update'])->name('admin/pasiens/update');
    Route::delete('/admin/pasiens/destroy/{id}', [PasienController::class, 'destroy'])->name('admin/pasiens/destroy');
});