<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\LoanPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Image;

class BranchController extends Controller
{
    public function AdminBankBranches(){
        $branch = Branch::paginate(15);
        // $dhaka = User::where('branch','dhaka')->where('role','employee')->count();
        // $khulna = User::where('branch','khulna')->where('role','employee')->count();
        // $rajshahi = User::where('branch','rajshahi')->where('role','employee')->count();
        // $chittagang = User::where('branch','chittagang')->where('role','employee')->count();
        return view('admin.Branch.branches',compact('branch'));
    }//End Method

    public function AdminAddBranch(){
        return view('admin.Branch.add_branch');
    }//End Method

    public function AdminAddBranchStore(Request $request){

        $image = $request->file('branch_photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/branch_images/'.$name_gen);
        $save_url = 'upload/branch_images/'.$name_gen;

        $unid = IdGenerator::generate(['table' => 'branches','field'=>'branch_id', 'length' => 10, 'prefix' => 'B']);

        Branch::insert([
            'branch_id' => $unid,
            'branch_name' =>$request->branch_name,
            'branch_address' => $request->branch_address,
            'branch_contact' => $request->branch_contact,
            'branch_email' =>$request->branch_email,
            'branch_text' =>$request->branch_text,
            'branch_funded_year' => $request->select,
            'branch_head' => $request->branch_head,
            'branch_photo' => $save_url
        ]);

       Alert::success('Congrats','Branch Added Successfully .');

        return redirect()->back();
    }//End Method

    public function AdminBranchEmployeeView($bid){
        // $user = Branch::where('id', $bid)->branch_head;
        $user = DB::table('branches')->where('id', $bid)->first()->branch_head;
        $emp_id = DB::table('users')->where('user_id', $user)->first()->id;
        $emp = DB::table('users')->where('id',$emp_id)->first();

        return view('admin.Branch.employee_details',compact('emp'));
    } // End Mehtod 

    

    public function AdminBranchDetails($id){
        $branch = Branch::where('id',$id)->first();
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $nemp = User::where('role','employee')->where('branch',$branchn)->count();
        $cust = User::where('role','customer')->where('branch',$branchn)->count();
        $loan = LoanPlan::where('branch_name',$branchn)->count();

        $user = DB::table('branches')->where('id', $id)->first()->branch_head;
        $head_id = DB::table('users')->where('user_id', $user)->first()->id;
        $head = DB::table('users')->where('id',$head_id)->first();

        return view('admin.Branch.view_branch',compact('branch','nemp','cust','loan','head'));
    }//end method

    public function AdminBranchEmployee($id){
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $nemp = User::where('role','employee')->where('branch',$branchn)->paginate(8);

        return view('admin.Branch.branch_employee_list',compact('nemp','branchn'));
    }//end method

    public function AdminBranchDelete($id){

        Branch::findOrFail($id)->delete();

        Alert::success('Congrats','Branch Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method

    public function AdminBranchCustomer($id){
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $ncus = User::where('role','customer')->where('branch',$branchn)->paginate(8);

        return view('admin.Branch.branch_customer_list',compact('ncus','branchn'));
    }//end method



    public function AdminBranchActiveLoanPlan($id){
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $lplan = LoanPlan::where('branch_name',$branchn)->paginate(8);

        return view('admin.Branch.branch_active_loan_plan',compact('lplan','branchn'));
    }//end method

    public function CustomerBranch(){
        $user_branch = Auth::user()->branch;
        $branch = Branch::where('branch_name',$user_branch)->first();
        $branchid = Branch::where('branch_name',$user_branch)->first()->id;

        $nemp = User::where('role','employee')->where('branch',$user_branch)->count();
        $cust = User::where('role','customer')->where('branch',$user_branch)->count();
        $loan = LoanPlan::where('branch_name',$user_branch)->count();

        $user = DB::table('branches')->where('id', $branchid)->first()->branch_head;
        $head_id = DB::table('users')->where('user_id', $user)->first()->id;
        $head = DB::table('users')->where('id',$head_id)->first();

        return view('customer.Branch.branch_all',compact('branch','nemp','cust','loan','head'));
    }//end method

    public function CustomerBranchEmployee($id){
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $nemp = User::where('role','employee')->where('branch',$branchn)->paginate(8);

        return view('customer.Branch.branch_employee_list',compact('nemp','branchn'));
    }//end method

    

    public function CustomerBranchActiveLoanPlan($id){
        $branchn = Branch::where('id',$id)->first()->branch_name;
        $lplan = LoanPlan::where('branch_name',$branchn)->paginate(8);

        return view('customer.Branch.branch_active_loan_plan',compact('lplan','branchn'));
    }//end method

    public function CustomerBranchLoanPlanInfo($id){
        $lplan = LoanPlan::where('id',$id)->first();

        return view('customer.Branch.view_loan_plan',compact('lplan'));
    }//end method
}
