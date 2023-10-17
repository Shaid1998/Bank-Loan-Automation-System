<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Image;
use Alert;

class BlogController extends Controller
{
    public function AdminBlogView(){
        $blog = Blog::paginate(15);

        return view('admin.Blog.all_blog',compact('blog'));
    }//End Method

    public function BlogAdd(){
        return view('admin.Blog.add_blog');
    }//End Method

    public function BlogStore(Request $request){
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/Blog_images/'.$name_gen);
        $save_url = 'upload/Blog_images/'.$name_gen;

        $date =Carbon::now()->format('d.m.Y');
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->user_id;

        $unid = IdGenerator::generate(['table' => 'blogs','field'=>'blog_id', 'length' => 10, 'prefix' => 'BL']);

        Blog::insert([
            'blog_id' => $unid,
            'blog_uploader_id' => $user_id,
            'blog_posted_by' => $user_name,
            'blog_details' => $request->blog_details,
            'blog_post_date' => $date,
            'blog_image' => $save_url,
            'blog_title' => $request->blog_title,
        ]);

        Alert::success('Congrats','Uploaded Successfully.');

        return redirect()->back();
    }//End Method

    public function BlogDelete($id){

        Blog::findOrFail($id)->delete();

        Alert::success('Congrats','Blog Deleted Successfully.');
        
        return redirect()->back(); 

    }// End Method
}
