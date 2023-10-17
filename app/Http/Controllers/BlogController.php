<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function AdminBlogView(){
        $blog = Blog::paginate(15);

        return view('admin.Blog.all_blog',compact('blog'));
    }//End Method

    public function BlogAdd(){
        return view('admin.Blog.add_blog');
    }//End Method
}
