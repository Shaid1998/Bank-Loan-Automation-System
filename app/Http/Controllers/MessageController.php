<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use App\Models\Message;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Str;

class MessageController extends Controller
{
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

    public function AdminBranchEmployeeSendMessage($id){
        $emp =User::where('id',$id)->first();

        return view('admin.Branch.new_message',compact('emp'));
    }//End Method

    public function AdminMessageStore(Request $request){
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
    }//End Method

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

    public function AdminBranchCustomerSendMessage($bid){
        $emp = DB::table('users')->where('id', $bid)->first();

        return view('admin.Branch.new_message',compact('emp'));
    } // End Mehtod 

    public function CustomerMessageList(){
        $user = Auth::user()->user_id;
        $sendMessage = Message::where('sender_id',$user)->paginate(15);
        $receiveMessage = Message::where('receiver_id',$user)->paginate(15);

        return view('customer.Message.messages',compact('sendMessage','receiveMessage'));
    }//End Method

    public function CustomerSendMessageReply($id){
        $message = Message::where('id', $id)->first();

        return view('customer.Message.reply_message',compact('message'));
    } // End Mehtod 

    public function CustomerSendMessageReplyStore(Request $request){
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

        return redirect()->route('customer.message.list');

    }// End Mehtod
    
    public function CustomerDeleteMessage($id){

        Message::findOrFail($id)->delete();

        Alert::success('Congrats','Message Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method

    public function EmployeeMessages(){
        $user = Auth::user()->user_id;
        $sendMessage = Message::where('sender_id',$user)->paginate(15);
        $receiveMessage = Message::where('receiver_id',$user)->paginate(15);

        return view('employee.Message.messages',compact('sendMessage','receiveMessage'));
    } // End Mehtod 

    public function EmployeeSendMessage($id){
        $message = Message::where('id', $id)->first();

        return view('employee.Message.new_message',compact('message'));
    } // End Mehtod 

    public function CustomerSendMessage($id){
        $emp = User::where('id',$id)->first();


        return view('customer.Branch.new_message',compact('emp'));
    } // End Mehtod 

    public function CustomerMessageStore(Request $request){
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

    public function EmployeeSendMessageStore(Request $request){
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

    public function EmployeeSendMessageReply($id){
        $message = Message::where('id', $id)->first();

        return view('employee.Message.reply_message',compact('message'));
    } // End Mehtod 

    public function EmployeeSendMessageReplyStore(Request $request){
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

    public function EmployeeDeleteMessage($id){

        Message::findOrFail($id)->delete();

        Alert::success('Congrats','Message Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method

    public function EmployeeSendCustomerMessage($id){
        $user = User::where('id', $id)->first();
        return view('employee.Customers.user_message',compact('user'));
    } // End Mehtod 


    public function EmployeeSendMessageCustomerStore(Request $request){
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

    public function EmployeeCustomerSendMessage($id){
        $loan = Loan::where('id', $id)->first();
        return view('employee.LoanPlan.new_message',compact('loan'));
    } // End Mehtod 

    public function EmployeeMessageSendCustomerStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'receiver_id' => $request->receiver_id,
            'message_for' => $request->message_for,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','Message Send Successfully.');

        return redirect()->back();

    }// End Mehtod 

    public function AdminLoanInquire($id){
        $loan = Loan::where('id',$id)->first();

        return view('admin.SystemData.loan_inq',compact('loan'));
    }//End Method

    public function AdminLoanInquireStore(Request $request){
        $unid = IdGenerator::generate(['table' => 'messages','field'=>'message_id', 'length' => 10, 'prefix' => 'M']);

        $id = Auth::user()->user_id;

        Message::insert([
            'sender_id' => $id,
            'receiver_id' => $request->receiver_id,
            'message_for' => $request->message_for,
            'text' => $request->text,
            'message_id' => $unid,
        ]);

        Alert::success('Congrats','inquire Send Successfully.');

        return redirect()->back();

    }// End Mehtod 

}
