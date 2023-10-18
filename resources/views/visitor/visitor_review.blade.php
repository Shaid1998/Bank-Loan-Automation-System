@extends('visitor.visitor_dashboard')
@section('visitor')

<div class="reviews">
    <div class="section-header">
        <h2>customers reviews</h2>
        <p>What our customer say about us</p>
    </div><!--/.section-header-->
    <div class="reviews-content">
        <div class="testimonial-carousel">
            @foreach ($review as $review)
             <div class="single-testimonial-box">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-img">
                            <img src="{{asset($review->reviewer_image)}}" alt="clients">
                        </div><!--/.testimonial-img-->
                        <div class="testimonial-person">
                            <h2>{{$review->reviewer_name}}</h2>
                            <h4>{{$review->reviewer_id}}</h4>
                            <div class="testimonial-person-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>{{$review->review}}</p>
                    </div>
                </div>
            </div>   
            @endforeach
        </div>
    </div>
</div>

@endsection