<header style="height: 90px;padding-top:2rem;padding-right:2rem" id="header-top" class="header-top">
    <ul>
        <li>
            <div class="header-top-left">
                <ul>
                    <a style="padding-left: 2rem" href="{{route('welcome')}}">City<span>Bank</span></a>
                    <li class="select-opt">
                        <select name="language" id="language">
                            <option value="default">EN</option>
                            <option value="Bangla">BN</option>
                            <option value="Arabic">AB</option>
                        </select>
                    </li>
                    <li class="select-opt">
                        <a href="#"><span class="lnr lnr-magnifier"></span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="head-responsive-right pull-right">
            <div class="header-top-right">
                <ul>
                    <li class="header-top-contact">
                        <a href="{{route('welcome')}}">home</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('visitor.howitworks')}}">how it works</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('visitor.loan.plan.view')}}">loan Plan</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('visitor.view.customer.review')}}">review</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('visitor.blog.view')}}">blog</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('visitor.view.contact')}}">contact</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('customer.login')}}">sign in</a>
                    </li>
                    <li class="header-top-contact">
                        <a href="{{route('customer.register.form')}}">register</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
            
</header><!--/.header-top-->
<!--header-top end -->

