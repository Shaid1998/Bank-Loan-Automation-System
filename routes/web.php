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
    Route::get('/admin/loan/plan/visit', [AdminController::class, 'AdminLoanPlanVisit'])->name('admin.loan.plan.visit');
    Route::get('/admin/messages', [AdminController::class, 'AdminMessages'])->name('admin.messages');
    Route::get('/admin/send/messages/{id}', [AdminController::class, 'AdminSendMessage'])->name('admin.send.message');
    Route::post('/admin/send/message/store', [AdminController::class, 'AdminSendMessageStore'])->name('admin.send.message.store');
    Route::get('/admin/send/messages/reply/{id}', [AdminController::class, 'AdminSendMessageReply'])->name('admin.send.message.reply');
    Route::post('/admin/send/message/reply/store', [AdminController::class, 'AdminSendMessageReplyStore'])->name('admin.send.message.reply.store');
    Route::get('/admin/send/messages/delete/{id}', [AdminController::class, 'AdminSendMessageDelete'])->name('admin.send.message.delete');
    Route::get('/admin/bank/branches', [AdminController::class, 'AdminBankBranches'])->name('admin.bank.branches');
    Route::get('/admin/add/branch', [AdminController::class, 'AdminAddBranch'])->name('admin.add.branch');
    Route::post('/admin/add/branch/store', [AdminController::class, 'AdminAddBranchStore'])->name('admin.new.branch.store');
    Route::get('/admin/branch/head/{id}', [AdminController::class, 'AdminBranchHead'])->name('admin.branch.head');

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
    Route::get('/employee/all/loan/plan/list', [EmployeeController::class, 'EmployeeAllLoanPlanList'])->name('employee.loan.plan');
    Route::get('/employee/loan/plan/add', [EmployeeController::class, 'EmployeeLoanPlanAdd'])->name('employee.loan.plan.add');
    Route::post('/employee/loan/plan/store', [EmployeeController::class, 'EmployeeLoanPlanStore'])->name('employee.loan.plan.store');
    Route::get('/employee/loan/plan/edit/{id}', [EmployeeController::class, 'EmployeeLoanPlanEdit'])->name('employee.loan.plan.edit');
    Route::post('/employee/loan/plan/update', [EmployeeController::class, 'EmployeeLoanPlanUpdate'])->name('employee.loan.plan.update');
    Route::get('/employee/loan/plan/delete/{id}', [EmployeeController::class, 'DeleteLoanPlan'])->name('employee.loan.plan.delete');
    Route::get('/employee/messages', [EmployeeController::class, 'EmployeeMessages'])->name('employee.messages');
    Route::get('/employee/send/messages/{id}', [EmployeeController::class, 'EmployeeSendMessage'])->name('employee.send.message');
    Route::post('/employee/send/message/store', [EmployeeController::class, 'EmployeeSendMessageStore'])->name('employee.send.message.store');
    Route::get('/employee/send/messages/reply/{id}', [EmployeeController::class, 'EmployeeSendMessageReply'])->name('employee.send.message.reply');
    Route::post('/employee/send/message/reply/store', [EmployeeController::class, 'EmployeeSendMessageReplyStore'])->name('employee.send.message.reply.store');
    Route::get('/employee/message/delete/{id}', [EmployeeController::class, 'EmployeeDeleteMessage'])->name('employee.message.delete');
    Route::get('/employee/customer/list', [EmployeeController::class, 'EmployeeCustomerList'])->name('employee.customer.list');
    Route::get('/employee/send/customer/message/{id}', [EmployeeController::class, 'EmployeeSendCustomerMessage'])->name('employee.send.customer.message');
    Route::post('/employee/send/message/customer/store', [EmployeeController::class, 'EmployeeSendMessageCustomerStore'])->name('employee.send.message.customer.store');

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
    Route::get('/customer/message/list', [CustomerController::class, 'CustomerMessageList'])->name('customer.message.list');
    Route::get('/customer/message/reply/{id}', [CustomerController::class, 'CustomerSendMessageReply'])->name('customer.send.message.reply');
    Route::get('/customer/message/delete/{id}', [CustomerController::class, 'CustomerSendMessageDelete'])->name('customer.send.message.delete');
    Route::post('/customer/message/reply/store', [CustomerController::class, 'CustomerSendMessageReplyStore'])->name('customer.send.message.reply.store');

});