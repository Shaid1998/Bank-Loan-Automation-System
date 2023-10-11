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
use App\Models\Message;

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

    public function AdminLoanPlanVisit(){
        $multiYear = LoanPlan::where('loan_duration','multiyearly')->latest()->get();
        $Year = LoanPlan::where('loan_duration','yearly')->latest()->get();
        $month = LoanPlan::where('loan_duration','monthly')->latest()->get();
        return view('admin.SystemData.loan_plan',compact('multiYear','Year','month'));
    } // End Mehtod 

    public function AdminMessages(){
        $user = Auth::user()->user_id;
        $sendMessage = Message::where('sender_id',$user)->latest()->get();
        $receiveMessage = Message::where('receiver_id',$user)->latest()->get();

        return view('admin.Message.messages',compact('sendMessage','receiveMessage'));
    } // End Mehtod 

    public function AdminSendMessage($id){
        $message = DB::table('loan_plans')->where('id', $id)->first();

        return view('admin.Message.new_message',compact('message'));
    } // End Mehtod 

    public function AdminSendMessageStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'receiver_id' => $request->receiver_id,
            'message_for' => $request->message_for,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','New Message Send Successfully.');

        return redirect()->back();

    }// End Mehtod 

    public function AdminSendMessageReply($id){
        $message = DB::table('messages')->where('id', $id)->first();

        return view('admin.Message.reply_message',compact('message'));
    } // End Mehtod 

    public function AdminSendMessageReplyStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'receiver_id' => $request->receiver_id,
            'message_for' => $request->message_for,
            'parent_id' => $request->parent_id,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','Reply Send Successfully.');

        return redirect()->back();

    }// End Mehtod

    public function AdminSendMessageDelete($id){

        Message::findOrFail($id)->delete();

        Alert::success('Congrats','Message Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method
}
