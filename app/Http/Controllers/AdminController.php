<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Image;
use Alert;
use App\Models\Branch;
use App\Models\Review;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    } // End Mehtod 

    public function AdminLogin(){
        return view('admin.admin_login');
    } // End Mehtod 

    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Mehtod 

    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    } // End Mehtod 

    public function AdminProfileStore(Request $request){

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
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod 

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } // End Mehtod 

    public function AdminUpdatePassword(Request $request){
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

    

    

    

    public function AdminEmployeeDelete($id){

        User::findOrFail($id)->delete();

        Alert::success('Congrats','Employee Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method

    public function AdminAddEmployee(){
        return view('admin.Employee.add_employee');
    }//End Method

    public function AdminEmployeeAddStore(Request $request){
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/employee_images/uploaded/'.$name_gen);
        $save_url = 'upload/employee_images/uploaded/'.$name_gen;

        $unid = IdGenerator::generate(['table' => 'users','field'=>'user_id', 'length' => 10, 'prefix' => 'E']);

        $remember = Str::random(9);

        User::insert([
            'username' => $request->username,
            'user_id' =>$unid,
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->status,
            'branch' => $request->branch,
            'remember_token' => $remember,
            'photo' => $save_url
        ]);

        Alert::success('Congrats','New Employee Inserted Successfully.');



        return redirect()->back();

    }// End Mehtod 

    public function AdminCustomerReview(){
        $review = Review::paginate(10);

        return view('admin.SystemData.review',compact('review'));
    }//End Method

    public function AdminCustomerReviewDelete($id){

        Review::findOrFail($id)->delete();

        Alert::success('Congrats','Employee Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method
}
