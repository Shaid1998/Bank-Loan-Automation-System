<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\visitorController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('customer.customer_index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/// Admin
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
});


/// Employee
Route::get('/employee/login', [EmployeeController::class, 'EmployeeLogin'])->name('employee.login');

Route::middleware(['auth','role:employee'])->group(function() {
    Route::get('/employee/dashboard', [EmployeeController::class, 'EmployeeDashboard'])->name('employee.dashobard');
    Route::get('/employee/logout', [EmployeeController::class, 'EmployeeDestroy'])->name('employee.logout');
    Route::get('/employee/profile', [EmployeeController::class, 'EmployeeProfile'])->name('employee.profile');
    Route::post('/employee/profile/store', [EmployeeController::class, 'EmployeeProfileStore'])->name('employee.profile.store');
    Route::get('/employee/change/password', [EmployeeController::class, 'EmployeeChangePassword'])->name('employee.change.password');
    Route::post('/employee/update/password', [EmployeeController::class, 'EmployeeUpdatePassword'])->name('employee.password');
    Route::get('/employee/all/account/request/list', [EmployeeController::class, 'EmployeeAllAccountRequest'])->name('employee.all.account.requests');
    Route::get('/employee/all/account/request/review/{id}', [EmployeeController::class, 'EmployeeAllAccountRequestReview'])->name('employee.account.request.review');
    Route::post('/employee/accept/account', [EmployeeController::class, 'EmployeeAcceptAccount'])->name('employee.accept.account');
    Route::get('/employee/all/account/request/delete/{id}', [EmployeeController::class, 'DeleteRequest'])->name('employee.account.request.delete');

});

/// Customer
Route::get('/customer/login', [CustomerController::class, 'CustomerLogin'])->name('customer.login');
Route::get('/customer/register/form', [CustomerController::class, 'CustomerRegisterForm'])->name('customer.register.form');
Route::post('/customer/register/form/store', [visitorController::class, 'CustomerRegisterDataStore'])->name('cus.data.to.employee');

Route::middleware(['auth','role:customer'])->group(function() {
    Route::get('/customer/dashboard', [CustomerController::class, 'CustomerDashboard'])->name('customer.dashobard');
    Route::get('/customer/logout', [CustomerController::class, 'CustomerDestroy'])->name('customer.logout');
    Route::get('/customer/profile', [CustomerController::class, 'CustomerProfile'])->name('customer.profile');
    Route::post('/customer/profile/store', [CustomerController::class, 'CustomerProfileStore'])->name('customer.profile.store');
    Route::get('/customer/change/password', [CustomerController::class, 'CustomerChangePassword'])->name('customer.change.password');
    Route::post('/customer/update/password', [CustomerController::class, 'CustomerUpdatePassword'])->name('ucustomer.password');
});