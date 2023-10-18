<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
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


    return view('visitor.visitor_index');
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
    Route::get('/admin/loan/plan/visit', [LoanController::class, 'AdminLoanPlanVisit'])->name('admin.loan.plan.visit');
    Route::get('/admin/messages', [MessageController::class, 'AdminMessages'])->name('admin.messages');
    Route::get('/admin/send/messages/{id}', [MessageController::class, 'AdminSendMessage'])->name('admin.send.message');
    Route::post('/admin/send/message/store', [MessageController::class, 'AdminSendMessageStore'])->name('admin.send.message.store');
    Route::get('/admin/send/messages/reply/{id}', [MessageController::class, 'AdminSendMessageReply'])->name('admin.send.message.reply');
    Route::post('/admin/send/message/reply/store', [MessageController::class, 'AdminSendMessageReplyStore'])->name('admin.send.message.reply.store');
    Route::get('/admin/send/messages/delete/{id}', [MessageController::class, 'AdminSendMessageDelete'])->name('admin.send.message.delete');
    Route::get('/admin/bank/branches', [BranchController::class, 'AdminBankBranches'])->name('admin.bank.branches');
    Route::get('/admin/add/branch', [BranchController::class, 'AdminAddBranch'])->name('admin.add.branch');
    Route::post('/admin/add/branch/store', [BranchController::class, 'AdminAddBranchStore'])->name('admin.new.branch.store');
    Route::get('/admin/branch/employee/view/{id}', [BranchController::class, 'AdminBranchEmployeeView'])->name('admin.branch.employee.view');
    Route::get('/admin/branch/employee/message/send/{id}', [MessageController::class, 'AdminBranchEmployeeSendMessage'])->name('admin.branch.employee.message.send');
    Route::post('/admin/message/store', [MessageController::class, 'AdminMessageStore'])->name('admin.message.store');
    Route::get('/admin/branch/details/{id}', [BranchController::class, 'AdminBranchDetails'])->name('admin.branch.details');
    Route::get('/admin/branch/employee/list/{id}', [BranchController::class, 'AdminBranchEmployee'])->name('admin.branch.employee.list');
    Route::get('/admin/branch/delete/{id}', [BranchController::class, 'AdminBranchDelete'])->name('admin.branch.delete');
    Route::get('/admin/employee/delete/{id}', [AdminController::class, 'AdminEmployeeDelete'])->name('admin.employee.delete');
    Route::get('/admin/add/employee', [AdminController::class, 'AdminAddEmployee'])->name('admin.add.employee');
    Route::post('/admin/employee/add/store', [AdminController::class, 'AdminEmployeeAddStore'])->name('admin.employee.add.store');
    Route::get('/admin/branch/customer/list/{id}', [BranchController::class, 'AdminBranchCustomer'])->name('admin.branch.customer.list');
    Route::get('/admin/branch/customer/message/send/{id}', [MessageController::class, 'AdminBranchCustomerSendMessage'])->name('admin.branch.customer.message.send');
    Route::get('/admin/branch/active/loan/plan/{id}', [BranchController::class, 'AdminBranchActiveLoanPlan'])->name('admin.branch.active.loan.list');
    Route::get('/admin/active/loan/view', [loanController::class, 'AdminActiveLoanView'])->name('admin.active.loan.view');
    Route::get('/admin/loan/inquire/{id}', [MessageController::class, 'AdminLoanInquire'])->name('admin.loan.inquire');
    Route::post('/admin/loan/inquire/store', [MessageController::class, 'AdminLoanInquireStore'])->name('admin.loan.inquire.store');
    Route::get('/admin/customer/review', [AdminController::class, 'AdminCustomerReview'])->name('admin.customer.review');
    Route::get('/admin/customer/review/delete/{id}', [AdminController::class, 'AdminCustomerReviewDelete'])->name('admin.customer.review.delete');
    Route::get('/admin/blog/view', [BlogController::class, 'AdminBlogView'])->name('admin.blog.view');
    Route::get('/admin/blog/add', [BlogController::class, 'BlogAdd'])->name('admin.blog.add');
    Route::post('/admin/blog/add/store', [BlogController::class, 'BlogStore'])->name('admin.blog.store');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'BlogDelete'])->name('admin.blog.delete');


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
    Route::get('/employee/all/loan/plan/list', [LoanController::class, 'EmployeeAllLoanPlanList'])->name('employee.loan.plan');
    Route::get('/employee/loan/plan/add', [LoanController::class, 'EmployeeLoanPlanAdd'])->name('employee.loan.plan.add');
    Route::post('/employee/loan/plan/store', [LoanController::class, 'EmployeeLoanPlanStore'])->name('employee.loan.plan.store');
    Route::get('/employee/loan/plan/edit/{id}', [LoanController::class, 'EmployeeLoanPlanEdit'])->name('employee.loan.plan.edit');
    Route::post('/employee/loan/plan/update', [LoanController::class, 'EmployeeLoanPlanUpdate'])->name('employee.loan.plan.update');
    Route::get('/employee/loan/plan/delete/{id}', [LoanController::class, 'DeleteLoanPlan'])->name('employee.loan.plan.delete');
    Route::get('/employee/messages', [MessageController::class, 'EmployeeMessages'])->name('employee.messages');
    Route::get('/employee/send/messages/{id}', [MessageController::class, 'EmployeeSendMessage'])->name('employee.send.message');
    Route::post('/employee/send/message/store', [MessageController::class, 'EmployeeSendMessageStore'])->name('employee.send.message.store');
    Route::get('/employee/send/messages/reply/{id}', [MessageController::class, 'EmployeeSendMessageReply'])->name('employee.send.message.reply');
    Route::post('/employee/send/message/reply/store', [MessageController::class, 'EmployeeSendMessageReplyStore'])->name('employee.send.message.reply.store');
    Route::get('/employee/message/delete/{id}', [MessageController::class, 'EmployeeDeleteMessage'])->name('employee.message.delete');
    Route::get('/employee/customer/list', [EmployeeController::class, 'EmployeeCustomerList'])->name('employee.customer.list');
    Route::get('/employee/send/customer/message/{id}', [MessageController::class, 'EmployeeSendCustomerMessage'])->name('employee.send.customer.message');
    Route::post('/employee/send/message/customer/store', [MessageController::class, 'EmployeeSendMessageCustomerStore'])->name('employee.send.message.customer.store');
    Route::get('/employee/all/loan/request', [LoanController::class, 'EmployeeLoanRequest'])->name('employee.all.loan.requests');
    Route::get('/employee/loan/request/review/{id}', [LoanController::class, 'EmployeeLoanRequestRewview'])->name('employee.loan.request.review');
    Route::get('/employee/loan/request/accept/{id}', [LoanController::class, 'EmployeeLoanRequestAccept'])->name('employee.loan.request.accept');
    Route::post('/employee/loan/request/accept/store', [LoanController::class, 'EmployeeLoanRequestAcceptStore'])->name('employee.accept.loan.store');
    Route::get('/employee/all/active/loan', [LoanController::class, 'EmployeeAllActiveLoan'])->name('employee.all.active.loan');
    Route::get('/employee/send/customer/message/{id}', [MessageController::class, 'EmployeeCustomerSendMessage'])->name('employee.send.customer.message');
    Route::post('/employee/send/customer/message/store', [MessageController::class, 'EmployeeMessageSendCustomerStore'])->name('employee.customer.send.message.store');
    Route::get('/employee/active/loan/delete/{id}', [MessageController::class, 'EmployeeActiveLoanDelete'])->name('employee.active.loan.delete');
    Route::get('/employee/customer/inquire/view', [EmployeeController::class, 'EmployeeCustomerQustion'])->name('employee.customer.inquire.view');

});

/// Customer
Route::get('/customer/login', [CustomerController::class, 'CustomerLogin'])->name('customer.login');
Route::get('/customer/register/form', [CustomerController::class, 'CustomerRegisterForm'])->name('customer.register.form');
Route::post('/customer/register/form/store', [visitorController::class, 'CustomerRegisterDataStore'])->name('cus.data.to.employee');
Route::get('/City-Bank/blog', [visitorController::class, 'BlogView'])->name('visitor.blog.view');
Route::get('/City-Bank/blog/view/{id}', [visitorController::class, 'BlogViewDetails'])->name('visitor.blog.view.details');
Route::get('/City-Bank/contact', [visitorController::class, 'VisitorContact'])->name('visitor.view.contact');
Route::get('/City-Bank/customer/review', [visitorController::class, 'VisitorCustomerReview'])->name('visitor.view.customer.review');
Route::get('/City-Bank/visitor/guide', [visitorController::class, 'VisitorGuide'])->name('visitor.howitworks');

Route::middleware(['auth','role:customer'])->group(function() {
    Route::get('/customer/dashboard', [CustomerController::class, 'CustomerDashboard'])->name('customer.dashobard');
    Route::get('/customer/logout', [CustomerController::class, 'CustomerDestroy'])->name('customer.logout');
    Route::get('/customer/profile', [CustomerController::class, 'CustomerProfile'])->name('customer.profile');
    Route::post('/customer/profile/store', [CustomerController::class, 'CustomerProfileStore'])->name('customer.profile.store');
    Route::get('/customer/change/password', [CustomerController::class, 'CustomerChangePassword'])->name('customer.change.password');
    Route::post('/customer/update/password', [CustomerController::class, 'CustomerUpdatePassword'])->name('ucustomer.password');
    Route::get('/customer/message/list', [MessageController::class, 'CustomerMessageList'])->name('customer.message.list');
    Route::get('/customer/message/reply/{id}', [MessageController::class, 'CustomerSendMessageReply'])->name('customer.send.message.reply');
    Route::get('/customer/message/delete/{id}', [MessageController::class, 'CustomerSendMessageDelete'])->name('customer.send.message.delete');
    Route::post('/customer/message/reply/store', [MessageController::class, 'CustomerSendMessageReplyStore'])->name('customer.send.message.reply.store');
    Route::get('/customer/branch', [BranchController::class, 'CustomerBranch'])->name('customer.branch');
    Route::get('/customer/branch/employee/list/{id}', [BranchController::class, 'CustomerBranchEmployee'])->name('customer.branch.employee.list');
    Route::get('/customer/message/send/{id}', [MessageController::class, 'CustomerSendMessage'])->name('customer.message.send');
    Route::post('/customer/message/store', [MessageController::class, 'CustomerMessageStore'])->name('customer.message.store');
    Route::get('/customer/branch/active/loan/plan/{id}', [BranchController::class, 'CustomerBranchActiveLoanPlan'])->name('customer.branch.active.loan.list');
    Route::get('/customer/branch/active/loan/plan/info/{id}', [BranchController::class, 'CustomerBranchLoanPlanInfo'])->name('customer.active.loan.plan.info');
    Route::get('/customer/apply/loan/{id}', [CustomerController::class, 'CustomerApplyLoan'])->name('customer.apply.loan');
    Route::post('/customer/apply/loan/store', [CustomerController::class, 'CustomerApplyLoanStore'])->name('customer.loan.apply.store');
    Route::get('/customer/loan/inquiry/{id}', [CustomerController::class, 'CustomerApplyInquiry'])->name('customer.loan.inquiery');
    Route::post('/customer/loan/inquiry/store', [CustomerController::class, 'CustomerApplyInquiryStore'])->name('customer.inquiery.store');
    Route::get('/customer/loan', [LoanController::class, 'CustomerLoan'])->name('customer.loan');
    Route::get('/customer/loan/application/edit/{id}', [CustomerController::class, 'CustomerLoanApplicationEdit'])->name('customer.loan.application.edit');
    Route::post('/customer/loan/application/edit/store', [CustomerController::class, 'CustomerLoanApplicationEditStore'])->name('customer.loan.application.edit.store');
    Route::get('/customer/loan/application/delete/{id}', [CustomerController::class, 'DeleteLoanRequest'])->name('customer.loan.application.delete');
    Route::get('/customer/contact/bank/{id}', [CustomerController::class, 'CustomerContactBank'])->name('customer.contact.bank');
    Route::post('/customer/contact/bank/store', [MessageController::class, 'CustomerContactBankStore'])->name('customer.contact.bank.store');
    Route::get('/customer/send/review', [CustomerController::class, 'CustomerSendReview'])->name('customer.send.review');
    Route::post('/customer/send/review/store', [CustomerController::class, 'CustomerSendReviewstore'])->name('customer.review.store');

});