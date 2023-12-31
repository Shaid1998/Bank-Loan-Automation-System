<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Alert;
use App\Models\Loan;
use App\Models\LoanRequest;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function AdminLoanPlanVisit(){
        $multiYear = LoanPlan::where('loan_duration','multiyearly')->paginate(15);
        $Year = LoanPlan::where('loan_duration','yearly')->paginate(15);
        $month = LoanPlan::where('loan_duration','monthly')->paginate(15);
        return view('admin.SystemData.loan_plan',compact('multiYear','Year','month'));
    } // End Mehtod 

    public function EmployeeAllLoanPlanList(){
        $multiYear = LoanPlan::where('loan_duration','multiyearly')->paginate(15);
        $Year = LoanPlan::where('loan_duration','yearly')->paginate(15);
        $month = LoanPlan::where('loan_duration','monthly')->paginate(15);
        return view('employee.LoanPlan.loanPlanList',compact('multiYear','Year','month'));
    } // End Mehtod 

    public function EmployeeLoanPlanAdd(){
        return view('employee.LoanPlan.add_loan_plan');
    }//end method

    public function EmployeeLoanPlanStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'loan_plans','field'=>'Loan_id', 'length' => 10, 'prefix' => 'L']);

        $id = Auth::user()->user_id;

        LoanPlan::insert([
            'Loan_type' => $request->Loan_type,
            'branch_name' => $request->branch_name,
            'loan_duration' => $request->loan_duration,
            'Loan_id' => $unid,
            'loan_description' => $request->loan_description,
            'emi' => $request->emi,
            'interest_rate' => $request->interest_rate,
            'uploader_id' => $id,
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

    public function CustomerLoan(){
        $user = Auth::user()->user_id;

        $applied = LoanRequest::where('user_id',$user)->orderBy('id', 'ASC')->paginate(10, ['*'], 'applied');

        $active =Loan::where('user_id',$user)->paginate(10, ['*'], 'active');

        return view('customer.Loan.loan_home',compact('applied','active'));
    }//End Method

    public function EmployeeLoanRequest(){
        $req = LoanRequest::paginate(10);

        return view('employee.LoanPlan.loan_request',compact('req'));
    }//End Method

    public function EmployeeLoanRequestRewview($id){
        $user_id = DB::table('loan_requests')->where('id', $id)->first()->user_id;
        $loanbranch = DB::table('loan_requests')->where('id', $id)->first();
        $loanc = DB::table('loan_requests')->where('id', $id)->first()->chosen_loan;
        $loan = LoanPlan::where('Loan_id',$loanc)->first();
        $user = User::where('user_id',$user_id)->first();

        return view('employee.LoanPlan.loan_request_review',compact('user','loan','loanbranch'));
    }//End Method

    public function EmployeeLoanRequestAccept($id){
        $user_id = DB::table('loan_requests')->where('id', $id)->first()->user_id;
        $loanreq = DB::table('loan_requests')->where('id', $id)->first();
        $loanc = DB::table('loan_requests')->where('id', $id)->first()->chosen_loan;
        $loan = LoanPlan::where('Loan_id',$loanc)->first();
        $user = User::where('user_id',$user_id)->first();

        return view('employee.LoanPlan.loan_request_accept',compact('user','loan','loanreq'));
    }//End Method

    public function EmployeeLoanRequestAcceptStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'loans','field'=>'loan_distribution_id', 'length' => 10, 'prefix' => 'LD']);

        $emp=Auth::user()->user_id;

        Loan::insert([
            'loan_distribution_id' => $unid,
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'plan_type' => $request->plan_type,
            'plan_interest_rate' => $request->plan_interest_rate,
            'plan_emi' => $request->plan_emi,
            'plan_branch' => $request->plan_branch,
            'distribution_branch' => $request->distribution_branch,
            'loan_amount' => $request->loan_amount,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone,
            'user_address' => $request->user_address,
            'user_commitment' => $request->user_commitment,
            'user_branch' => $request->user_branch,
            'issue_date' => $request->issue_date,
            'expire_date' => $request->expire_date,
            'issued_by' => $emp,
        ]);

        Alert::success('Congrats','Loan Accepted.');

        return redirect()->route('employee.all.loan.requests');
    }//End Method

    public function EmployeeAllActiveLoan(){
        $active =Loan::paginate(15);

        return view('employee.LoanPlan.active_loan',compact('active'));
    }//End Method

    public function AdminActiveLoanView(){
        $active =Loan::paginate(15);

        return view('admin.SystemData.active_loan',compact('active'));
    }//End Method

    public function EmployeeActiveLoanDelete($id){

        Loan::findOrFail($id)->delete();

        Alert::success('Congrats','Active Loan Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method
}
