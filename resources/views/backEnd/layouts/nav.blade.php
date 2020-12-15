<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/farmerpanel')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/farmerpanel')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/farmer/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
                <li><a href="{{url('/farmer/product/create')}}">Add New Products</a></li>
                <li><a href="{{route('product.index')}}">List Products</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Add New Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">List Coupons</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Order Status</span></a>
            <ul>
                <li><a href="{{url('/farmer/checkorder')}}">List Orders</a></li>
            </ul>
        </li>
        <li class="{{$menu_active==6? ' active':''}}"> <a href="{{url('/farmer/addkyc')}}"><i class="icon icon-th-list"></i> <span>Update KYC</span></a>
        </li>
        <li class="submenu {{$menu_active==7? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Feedbacks</span></a>
            <ul>
                <li><a href="{{route('farmerfeedbackpage')}}">Add Feedback</a></li>
                <li><a href="{{route('farmerfeedbacklists')}}">List Feedbacks</a></li>
                <li><a href="{{route('farmerreplyindex')}}">Reply Feedback</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->