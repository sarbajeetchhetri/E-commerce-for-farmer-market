<!--sidebar-menu-->
<div id="sidebar"><a href="{{route('admin_home')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li {{$menu_active==1? ' class=active':''}}><a href="{{route('admin_home')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li {{$menu_active==2? ' class=active':''}}><a href="{{route('countryhome')}}"><i class="icon icon-th-list"></i> <span>Add Country</span></a> </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Feedbacks</span></a>
            <ul>
                <li><a href="{{route('feedbackpage')}}">Add Feedback</a></li>
                <li><a href="{{route('feedbacklists')}}">List Feedbacks</a></li>
                <li><a href="{{route('replyindex')}}">Reply Feedback</a></li>
            </ul>
        </li>
        <li {{$menu_active==4? ' class=active':''}}><a href="{{url('/admin/verify')}}"><i class="icon icon-th-list"></i> <span>Farmer verification</span></a> </li>

</div>
<!--sidebar-menu-->