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

    public function CustomerMessageList(){
        $user = Auth::user()->user_id;
        $sendMessage = Message::where('sender_id',$user)->paginate(15);
        $receiveMessage = Message::where('receiver_id',$user)->paginate(15);

        return view('customer.Message.messages',compact('sendMessage','receiveMessage'));
    }//End Method

    
    
}
