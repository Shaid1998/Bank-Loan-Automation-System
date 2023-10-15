<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;
use Alert;
use App\Models\Branch;
use App\Models\LoanPlan;
use App\Models\LoanRequest;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function CustomerDashboard(){
        return view('customer.customer_index');
    } // End Mehtod 

    public function CustomerLogin(){
        return view('customer.customer_login');
    } // End Mehtod 

    public function CustomerDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/customer/login');
    } // End Mehtod 

    public function CustomerProfile(){
        $id = Auth::user()->id;
        $customerData = User::find($id);
        return view('customer.customer_profile_view',compact('customerData'));

    } // End Mehtod 

    public function CustomerProfileStore(Request $request){

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
            'message' => 'Customer Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod 

    public function CustomerChangePassword(){
        return view('customer.customer_change_password');
    } // End Mehtod 

    public function CustomerUpdatePassword(Request $request){
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

    public function CustomerRegisterForm(){
        return view('visitor.visitor_register');
    }//end method

    public function CustomerApplyLoan($id){
        $loan = LoanPlan::where('id',$id)->first();

        return view('customer.Loan.apply_loan',compact('loan'));
    }//End Method

    public function CustomerApplyLoanStore(Request $request){
        $id = Auth::user()->user_id;
        $unid = IdGenerator::generate(['table' => 'loan_requests','field'=>'loan_request_id', 'length' => 10, 'prefix' => 'LR']);

        LoanRequest::insert([
            'loan_request_id' => $unid,
            'Amount' => $request->Amount,
            'chosen_loan' => $request->chosen_loan,
            'Commitment' => $request->Commitment,
            'branch' => $request->branch,
            'user_id' => $id,
        ]);

        Alert::success('Congrats','Loan Apply Successfully. You Receive Reaction From Our Representative.');

        return redirect()->back();
        
    }//End Method

    public function CustomerApplyInquiry($id){
        $loan = LoanPlan::where('id',$id)->first();

        return view('customer.Loan.inquery',compact('loan'));
    }//End Method

    public function CustomerApplyInquiryStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'branch' => $request->branch,
            'message_for' => $request->message_for,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','Inquiery Topic Send Successfully.');

        return redirect()->back();

    }// End Mehtod 
    
}
