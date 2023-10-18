<?php

namespace App\Http\Controllers;

use App\Models\regreq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Alert;
use App\Models\Blog;
use App\Models\Review;
use App\Models\siteExt;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;

class visitorController extends Controller
{
    public function CustomerRegisterDataStore(Request $request){
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'username' => 'required|max:8',
        //     'email' => 'required|email|unique:regreq|max:255',
        //     'password' => 'required|min:8',
        //     'phone' => 'required|max:12|min:10',
        //     'address' => 'required|max:255',
        //     'photo' => 'required|max:255',
        // ]);



        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/customer_images/uploaded/'.$name_gen);
        $save_url = 'upload/customer_images/uploaded/'.$name_gen;

        $unid = IdGenerator::generate(['table' => 'regreqs','field'=>'req_user_id', 'length' => 10, 'prefix' => 'R']);

        regreq::insert([
            'req_full_name' => $request->name,
            'req_user_id' =>$unid,
            'req_username' => $request->username,
            'req_email' => $request->email,
            'req_password' =>Hash::make($request->password),
            'req_phone' => $request->phone,
            'req_address' => $request->address,
            'req_photo' => $save_url
        ]);

       Alert::success('Congrats','Submitted form. After confirmation you receive email notification.');

        return redirect()->back();
    }//End Method

    public function BlogView(){
        $blog = Blog::all();

        return view('visitor.blog.visitor_blog',compact('blog'));
    }//End Method

    public function BlogViewDetails($id){
        $blog = Blog::where('id',$id)->first();

        return view('visitor.blog.blog_view',compact('blog'));
    }//End Method

    public function VisitorContact(){

        return view('visitor.Contact');
    }//End Method

    public function VisitorCustomerReview(){
        $review = Review::all();

        return view('visitor.visitor_review',compact('review'));
    }//End Method

    public function VisitorGuide(){
        $site = siteExt::all();
        
        return view('visitor.visitor_how_it_works',compact('site'));
    }//End Method
}
