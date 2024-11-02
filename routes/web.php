<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[HomeController::class,'index']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/appointment',[HomeController::class,'appointment']);

    Route::get('/myAppointment',[HomeController::class,'myAppointment']);
    Route::delete('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint'])->name('cancel_appoint');;

    

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'redirect'])->name('dashboard');

    // ---- admin route 
    Route::middleware(['admin'])->group(function () {
        Route::get('/home', function () {
            return view('admin.home');
        })->name('admin.home');

        // admin operations 
        Route::get('/add-doctor',[AdminController::class,'addDoctor']);
        Route::post('/upload_doctor',[AdminController::class,'uploadDoctor']);
        Route::get('/showAppointments',[AdminController::class,'showAppointments']);
        Route::delete('/deleteAppoint/{id}',[AdminController::class,'deleteAppoint']);
        Route::post('/approve/{id}',[AdminController::class,'approve']);
        Route::get('/list-doctor',[AdminController::class,'doctorList']);
        Route::delete('/deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);
        Route::post('/editDoctor',[AdminController::class,'editDoctor'])->name('editDoctor');
        Route::get('/emailview/{id}',[AdminController::class,'emailview']);
        Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);
    });  

    // ---- user route
    Route::get('/user/home', function () {
        return view('user.userHome');
        })->name('user.home');


    });
     
