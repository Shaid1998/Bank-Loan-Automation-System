<?php

namespace App\Http\Controllers;

use App\Models\regreq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Alert;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

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
            @unlink(public_path('upload/employee_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'),$filename);
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
        $accData = regreq::paginate(15);
        return view('employee.Accounts.all_account_request',compact('accData'));
    } // End Mehtod 

    public function EmployeeAllAccountRequestReview($serial){
        $accData = regreq::findOrFail($serial);
        return view('employee.Accounts.account_request_review',compact('accData'));
    } // End Mehtod 

    public function EmployeeAcceptAccount(Request $request){
        $unid = IdGenerator::generate(['table' => 'users','field'=>'user_id', 'length' => 10, 'prefix' => 'C']);

        $remember = Str::random(9);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->remember_token = $remember;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->photo = $request->photo;
        $user->user_id = $unid;
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

    

    

    public function EmployeeCustomerList(){
        $customer = User::where('role', 'customer')->paginate(15);

        return view('employee.Customers.all_customer',compact('customer'));
    } // End Mehtod 

    

}
