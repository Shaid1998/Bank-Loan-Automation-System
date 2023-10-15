<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Alert;
use App\Models\LoanRequest;

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
        $applied = LoanRequest::where('user_id',$user)->paginate(10);

        return view('customer.Loan.loan_home',compact('applied'));
    }//End Method
}
