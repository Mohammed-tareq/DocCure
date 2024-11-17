<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', function () {return view('welcome');})->name('welcome');

// for all error page go to home if user is logged in
Route::fallback(function () {if(Auth::check()){return redirect()->route('home');}elseif(Auth::guard('doctor')->check()){return redirect()->route('doctor.index');}});

Route::middleware('auth')->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/user/password/{id}', [HomeController::class, 'password'])->name('password');
    Route::put('/user/changepass/{id}', [HomeController::class, 'userchangepass'])->name('user.changepass');

    Route::get('/user/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [HomeController::class, 'update'])->name('user.update');

    Route::get('/user/doctors', [HomeController::class, 'doctors'])->name('user.doctors');
    Route::get('/doctor/profile/{id}', [HomeController::class, 'showProfileToUser'])->name('show.doctor.profile');

    Route::get('/doctor/book/{id}', [HomeController::class, 'book'])->name('user.book');
    Route::post('/doctor/book', [HomeController::class, 'makeappointment'])->name('makeappointment');

    Route::get('/bookcancel/{id}', [HomeController::class, 'cancelappointment'])->name('cancel.appointment.user');

});



Route::middleware('doctor')->group(function () {

    Route::resource('/doctor', DoctorController::class);
    Route::get('/doctorlogout', [DoctorController::class, 'logout'])->name('doctor.logout');
    Route::get('/doctorprofile/{id}', [DoctorController::class, 'showProfileToDoctor'])->name('doctor.profile');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/accept/{id}', [AppointmentController::class, 'appointmentaccept'])->name('appointment.accept.doctor');
    Route::get('/appointment/cancal/{id}', [AppointmentController::class, 'appointmentcancal'])->name('appointment.cancal.doctor');
});


Route::get('/doctorlogin',[DoctorController::class, 'login'])->name('doctor.login');
Route::get('/doctorregister',[DoctorController::class, 'register'])->name('doctor.register');

Route::post('/doctorlogin',[DoctorController::class, 'makedoctorlogin'])->name('make.doctor.login');
Route::post('/doctorregister',[DoctorController::class, 'makedoctorregister'])->name('make.doctor.register');


