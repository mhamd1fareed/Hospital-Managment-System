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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/add_doctor_view',[AdminController::class,'addView']);
Route::post('/upload_doctor',[AdminController::class,'upload']);//show_appointments
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/my_appointments',[HomeController::class,'myAppointments']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancelAppointment']);
Route::get('/show_appointments',[AdminController::class,'showAppointments']);
Route::get('/approve/{id}',[AdminController::class,'approve']);
Route::get('/cancel/{id}',[AdminController::class,'cancel']);
Route::get('/show_doctors',[AdminController::class,'showDoctors']);//delete_doctor
Route::get('/delete_doctor/{id}',[AdminController::class,'delete']);
Route::get('/update_doctor/{id}',[AdminController::class,'update']);
Route::post('/edit/{id}',[AdminController::class,'edit']);