<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +977-9847045339</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> farmingmarket@farm.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="{{@asset('frontEnd/images/home/farmerlogo.PNG')}}" alt="" width="100" height="100" /></a>
                    </div>
                    
                </div>
                <div class="col-sm-9">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/viewcart')}}" class="{{$menu_active==6? ' active':''}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                                
                                <li><a href="{{url('/myaccount')}}" class="{{$menu_active==9? ' active':''}}"><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href="{{ url('/logout') }}" class="{{$menu_active==10? ' active':''}}"><i class="fa fa-lock"></i> Logout </a></li>
                                <li><a href="{{route('supplierfeedbackpage')}}" class="{{$menu_active==11? ' active':''}}"><i class="fa fa-comment"></i> Send Feedbacks</a></li>
                                <li><a href="{{route('supplierfeedbacklists')}}" class="{{$menu_active==12? ' active':''}}"><i class="fa fa-comment"></i> View Reply</a></li>
                                <li><a href="{{route('supplierreplyindex')}}" class="{{$menu_active==13? ' active':''}}"><i class="fa fa-comment"></i> Reply Feedbacks</a></li>
                                
                            @else
                                <li><a href="{{url('/login_page')}}" class="{{$menu_active==7? ' active':''}}"><i class="fa fa-lock"></i> SupplierLogin</a></li>
                                
                                <li><a href="{{url('/farmer_login')}}" class="{{$menu_active==8? ' active':''}}"><i class="fa fa-lock"></i>farmerLogin</a></li>
                            @endif
                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="{{$menu_active==1? ' active':''}}">Home</a></li>

                            <li class="dropdown"><a href="#" class="{{$menu_active==5? ' active':''}}" id="navi" >Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/list-products')}}" id="navi">Products</a></li>
                                    <li><a href="{{url('/viewcart')}}" id="navi">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('/aboutus')}}" id="navi" class="{{$menu_active==2? ' active':''}}">AboutUs</a></li>
                            <li><a href="{{url('/newsfeed')}}" id="navi" class="{{$menu_active==3? ' active':''}}">News Feed</a></li>
                            <li><a href="{{url('/contactus')}}" id="navi" class="{{$menu_active==4? ' active':''}}">ContactUs</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
