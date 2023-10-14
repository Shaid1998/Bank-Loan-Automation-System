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
        $multiYear = LoanPlan::where('loan_duration','multiyearly')->paginate(15);
        $Year = LoanPlan::where('loan_duration','yearly')->paginate(15);
        $month = LoanPlan::where('loan_duration','monthly')->paginate(15);
        return view('admin.SystemData.loan_plan',compact('multiYear','Year','month'));
    } // End Mehtod 

    public function AdminMessages(){
        $user = Auth::user()->user_id;
        $sendMessage = Message::where('sender_id',$user)->paginate(15);
        $receiveMessage = Message::where('receiver_id',$user)->paginate(15);

        return view('admin.Message.messages',compact('sendMessage','receiveMessage'));
    } // End Mehtod 

    public function AdminSendMessage($id){
        $message = LoanPlan::where('id', $id)->first();

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
        $message = Message::where('id', $id)->first();

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

    public function AdminBranchHead($bid){
        // $user = Branch::where('id', $bid)->branch_head;
        $user = DB::table('branches')->where('id', $bid)->first()->branch_head;
        $head_id = DB::table('users')->where('user_id', $user)->first()->id;
        $head = DB::table('users')->where('id',$head_id)->first();

        return view('admin.Branch.head_details',compact('head'));
    } // End Mehtod 

    public function AdminBranchHeadSendMessage($bid){
        $head = DB::table('users')->where('id', $bid)->first();

        return view('admin.Branch.new_message',compact('head'));
    } // End Mehtod 

    public function AdminBranchHeadSendMessageStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'receiver_id' => $request->receiver_id,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','Message Send Successfully.');

        return redirect()->back();

    }// End Mehtod 

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
}
