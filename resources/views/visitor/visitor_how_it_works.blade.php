@extends('visitor.visitor_dashboard')
@section('visitor')

<section id="works" class="works">
    <div class="container">
        <div class="section-header">
            <h2>how it works</h2>
            <p>Learn More about how our website works</p>
        </div><!--/.section-header-->
        <div class="works-content">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-how-works">
                        <div class="single-how-works-icon">
                            <i class="flaticon-lightbulb-idea"></i>
                        </div>
                        <h2><a href="#">choose <span> Login or Registration </span></a></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
                        </p>
                        <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
                            read more
                        </button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-how-works">
                        <div class="single-how-works-icon">
                            <i class="flaticon-networking"></i>
                        </div>
                        <h2><a href="#">find <span> what you want</span></a></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
                        </p>
                        <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
                            read more
                        </button>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-how-works">
                        <div class="single-how-works-icon">
                            <i class="flaticon-location-on-road"></i>
                        </div>
                        <h2><a href="#">explore <span> amazing</span> Plan</a></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt ut laboremagna aliqua. 
                        </p>
                        <button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
                            read more
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->
</section>
<section id="statistics"  class="statistics">
    <div class="container">
        <div class="statistics-counter"> 
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">10 </div> <span>+</span>
                    </div><!--/.statistics-content-->
                    <h3>branchs</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">40</div> <span>+</span>
                    </div><!--/.statistics-content-->
                    <h3>loan plans</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">1000</div> <span>+</span>
                    </div><!--/.statistics-content-->
                    <h3>employees</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">5000</div> <span>+</span>
                    </div><!--/.statistics-content-->
                    <h3>happy customers</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
        </div><!--/.statistics-counter-->	
    </div><!--/.container-->
</section>

@endsection