<?php

namespace App\Http\Controllers;

use App\Models\regreq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Alert;
use App\Models\LoanPlan;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    public function EmployeeDashboard(){
        return view('employee.employee_index');
    } // End Mehtod 

    public function EmployeeLogin(){
        return view('employee.employee_login');
    } // End Mehtod 

    public function EmployeeDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/employee/login');
    } // End Mehtod 

    public function EmployeeProfile(){
        $id = Auth::user()->id;
        $employeeData = User::find($id);
        return view('employee.employee_profile_view',compact('employeeData'));

    } // End Mehtod 

    public function EmployeeProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address; 


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Employee Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod 

    public function EmployeeChangePassword(){
        return view('employee.employee_change_password');
    } // End Mehtod 

    public function EmployeeUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|numeric|confirmed|min:8', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod 

    public function EmployeeAllAccountRequest(){
        $accData = regreq::all();
        return view('employee.Accounts.all_account_request',compact('accData'));
    } // End Mehtod 

    public function EmployeeAllAccountRequestReview($serial){
        $accData = regreq::findOrFail($serial);
        return view('employee.Accounts.account_request_review',compact('accData'));
    } // End Mehtod 

    public function EmployeeAcceptAccount(Request $request){
        $remember = Str::random(9);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->remember_token = $remember;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->photo = $request->photo;
        $user->user_id = $request->user_id;
        $user->password = $request->password;
        $user->role = 'customer';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        Alert::success('Congrats','New Customer Inserted Successfully.');



        return redirect()->route('employee.all.account.requests');

    }// End Mehtod 

    public function DeleteRequest($id){

        regreq::findOrFail($id)->delete();

        Alert::success('Danger','Request Deleted.');
        
        return redirect()->back(); 

    }// End Method

    public function EmployeeAllLoanPlanList(){
        $multiYear = LoanPlan::where('loan_duration','multiyearly')->latest()->get();
        $Year = LoanPlan::where('loan_duration','yearly')->latest()->get();
        $month = LoanPlan::where('loan_duration','monthly')->latest()->get();
        return view('employee.LoanPlan.loanPlanList',compact('multiYear','Year','month'));
    } // End Mehtod 

    public function EmployeeLoanPlanAdd(){
        return view('employee.LoanPlan.add_loan_plan');
    }//end method

    public function EmployeeLoanPlanStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'loan_plans','field'=>'Loan_id', 'length' => 10, 'prefix' => 'L']);
        LoanPlan::insert([
            'Loan_type' => $request->Loan_type,
            'branch_name' => $request->branch_name,
            'loan_duration' => $request->loan_duration,
            'Loan_id' => $unid,
            'loan_description' => $request->loan_description,
            'emi' => $request->emi,
            'interest_rate' => $request->interest_rate,
        ]);

        Alert::success('Congrats','New Loan Plan Inserted Successfully.');

        return redirect()->route('employee.loan.plan');

    }// End Mehtod 

    public function EmployeeLoanPlanEdit($serial){
        $loanData = LoanPlan::findOrFail($serial);
        return view('employee.LoanPlan.edit_loan_plan',compact('loanData'));
    } // End Mehtod 

    public function EmployeeLoanPlanUpdate(Request $request){
        $id = $request->id;

        LoanPlan::findOrFail($id)->update([
            'Loan_type' => $request->Loan_type,
            'branch_name' => $request->branch_name,
            'loan_duration' => $request->loan_duration,
            'loan_description' => $request->loan_description,
            'emi' => $request->emi,
            'interest_rate' => $request->interest_rate,
        ]);

        Alert::success('Congrats','Loan Plan Updated Successfully.');

        return redirect()->route('employee.loan.plan');
    }//End Method

    public function DeleteLoanPlan($id){

        LoanPlan::findOrFail($id)->delete();

        Alert::success('Congrats','Loan Plan Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method
}
