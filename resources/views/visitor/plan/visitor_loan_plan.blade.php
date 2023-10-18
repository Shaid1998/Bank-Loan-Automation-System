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
                    @foreach ($plan as $plan)
                    <a href="{{route('visitor.plan.view.details',$plan->id)}}">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-blog-item">
                                <div class="single-blog-item-txt">
                                    <h2>Loan Id: {{$plan->Loan_id}}</h2>
                                    <h2><a>Branch: {{$plan->branch_name}}</a></h2>
                                    <h2><a>Duration: {{$plan->interest_rate}}</a></h2>
                                    <p>{{$plan->loan_description}}</p>
                                </div>
                            </div>
                        </div> 
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection