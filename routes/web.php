<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentController;
use App\Models\Document;
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

Route::get('/', function () {
    return view('ssp-home');
});

// Route::get('/student-profile', function () {
//     return view('student-profile');

// });


// Route::get('/admin-student-list', function () {
//     return view('admin-student-list');
// });
// Route::get('/admin-request-list', function () {
//     return view('admin-request-list');
// });
// Route::get('/admin-add-student', function () {
//     return view('admin-add-student');
// });

Route::get('/staff-register', [Controller::class,'staffRegistration'])->name('staff.registration');
Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
});
Route::get('/student-dashboard', function () {
    dd('alksdjfklaj');

    return view('student-dashboard', compact('documents'));
});
Route::get('/admin-approved-request', function () {
    return view('admin-approved-request');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:student']], function () {
    Route::get('/student-dashboard',[RequestController::class,'index'])->name('student.profile');
    Route::post('/request-document', [DocumentController::class, 'attach'])->name('request.document');
});

Route::group(['middleware' => ['role:ssc-staff']], function () {
    Route::get('/admin-add-staff',[Controller::class,'addStaff'])->name('admin.add');
Route::post('/admin-store-staff',[Controller::class,'storeStaff'])->name('admin.store');

Route::get('/admin-add-student',[StudentController::class,'index'])->name('student.add');
Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
Route::get('/admin-student-list',[StudentController::class,'studentlist'])->name('studentlist');
Route::get('/admin-staff-list',[StudentController::class,'stafflist'])->name('stafflist');
Route::delete('/staff/delete/{id}',[StudentController::class,'destroyStaff'])->name('staff.delete');
Route::delete('/staff/delete/{id}',[StudentController::class,'destroyStudent'])->name('student.delete');

Route::post('/admin-add-document',[DocumentController::class,'store'])->name('document.add');
Route::get('/admin-document', [DocumentController::class, 'index'])->name('document.create');
Route::get('/admin-document-list', [DocumentController::class, 'list'])->name('document.list');
Route::DELETE('/admin-document/delete/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');

Route::get('/admin-edit/{id}',[RequestController::class,'edit'])->name('request.edit');
Route::get('/admin-request-list',[RequestController::class,'requestlist'])->name('requestlist');

Route::get('/student-request',[RequestController::class,'create'])->name('student.request');
Route::post('/request/store',[RequestController::class,'store'])->name('request.store');
Route::put('/request/updated',[RequestController::class,'update'])->name('request.update');
Route::delete('/request/delete/{id}',[RequestController::class,'destroy'])->name('request.delete');

});