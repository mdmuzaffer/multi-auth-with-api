<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    DoctorController,
    InternController,
    PatientController,
};

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

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register',[AuthController::class, 'loadRegister']);
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::get('/login', function(){
    return redirect('/');
});

Route::get('/',[AuthController::class, 'loadLogin']);
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::get('/logout',[AuthController::class, 'logout']);


/* Admin routes */
Route::group(['prefix'=>'admin', 'middleware'=>['web', 'isAdmin']], function(){
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
});


/* Intern routes */
Route::group(['prefix'=>'intern', 'middleware'=>['web', 'isIntern']], function(){
    Route::get('/dashboard',[InternController::class, 'dashboard'])->name('admin.dashboard');
});

/* Doctor routes */
Route::group(['prefix'=>'doctor', 'middleware'=>['web', 'isDoctor']], function(){
    Route::get('/dashboard',[DoctorController::class, 'dashboard'])->name('admin.dashboard');
});

/* Patient routes */
Route::group(['middleware'=>['web', 'isPatient']], function(){
    Route::get('/dashboard',[PatientController::class, 'dashboard'])->name('admin.dashboard');
});