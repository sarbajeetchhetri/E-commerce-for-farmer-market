<!--Header-part-->
<div id="header">
    <h1><a href="#">Farmer Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="{{ url('/farmer/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class="">
            <a class="dropdown-item" href="{{ url('/farmerlogout')}}">
                <i class="icon icon-share-alt"></i>{{ __('Logout') }}
            </a>

        </li>
        <li class=""><a class="dropdown-item">
                <span class="text"><?php echo auth::user()->name ?></span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->