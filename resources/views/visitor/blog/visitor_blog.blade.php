@extends('visitor.visitor_dashboard')
@section('visitor')

<div class="page-content">
    <div  class="blog" >
        <div class="container">
            <div class="section-header">
                <h2>blogs and articles</h2>
                <p>Always upto date with our latest Blogs and Articles </p>
            </div><!--/.section-header-->
            <div class="blog-content">
                <div class="row">
                    @foreach ($blog as $blog)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-blog-item">
                            <div class="single-blog-item-img">
                                <img src="{{ $blog->blog_image}}" alt="blog image">
                            </div>
                            <div class="single-blog-item-txt">
                                <h2><a href="{{route('visitor.blog.view.details',$blog->id)}}">{{$blog->blog_title}}</a></h2>
                                <h4>posted <span>by</span> <a href="#">{{$blog->blog_posted_by}}</a> {{$blog->blog_post_date}}</h4>
                                <p>{{$blog->blog_details}}</p>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection