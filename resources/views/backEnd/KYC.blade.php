@extends('backEnd.layouts.master')
@section('title','KYC Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/farmer/addkyc')}}">Update Your KYC information</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Update Your KYC information</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{url('/farmer/update-kyc/{id}')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field('PUT')}}
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls {{$errors->has('address')?'has-error':''}}" >
                            <input type="text" name="address" value="{{$user_login->address}}" id="address" placeholder="Address" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('address')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls {{$errors->has('city')?'has-error':''}}" >
                            <input type="text" name="city" value="{{$user_login->address}}" id="city" placeholder="City" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('city')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls {{$errors->has('state')?'has-error':''}}" >
                            <input type="text" name="state" value="{{$user_login->state}}" id="state" placeholder="State" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('state')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Country</label>
                        <div class="controls {{$errors->has('country')?'has-error':''}}" >
                             <select name="country" id="country" style="width: 415px;">
                                @foreach($countries as $country)
                                    <option value="{{$country->country_name}}" {{$user_login->country==$country->country_name?' selected':''}}>{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('country')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Pincode</label>
                        <div class="controls {{$errors->has('pincode')?'has-error':''}}" >
                            <input type="text" name="pincode" value="{{$user_login->pincode}}" id="pincode" placeholder="Pincode" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('pincode')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Mobile</label>
                        <div class="controls {{$errors->has('mobile')?'has-error':''}}" >
                            <input type="text" name="mobile" value="{{$user_login->mobile}}" id="mobile" placeholder="Mobile" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('mobile')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">DOB</label>
                        <div class="controls {{$errors->has('dob')?'has-error':''}}" >
                            <input type="date" name="dob" value="{{$user_login->dob}}" id="dob" placeholder="DOB" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('dob')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">GrandFather Name</label>
                        <div class="controls {{$errors->has('gfname')?'has-error':''}}" >
                            <input type="text" name="gfname" value="{{$user_login->gfname}}" id="gfname" placeholder="GrandFather Name" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('gfname')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Father Name</label>
                        <div class="controls {{$errors->has('faname')?'has-error':''}}" >
                            <input type="text" name="faname" value="{{$user_login->faname}}" id="faname" placeholder="Father Name" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('faname')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Mother Name</label>
                        <div class="controls {{$errors->has('mname')?'has-error':''}}" >
                            <input type="text" name="mname" value="{{$user_login->mname}}" id="mname" placeholder="Mother Name" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('mname')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Source Of Funds</label>
                        <div class="controls {{$errors->has('sfund')?'has-error':''}}" >
                            <input type="text" name="sfund" value="{{$user_login->sfund}}" id="sfund" placeholder="Source Of Funds" style="width: 415px;">
                            <span class="text-danger">{{$errors->first('sfund')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">CitizenShip</label>
                        <div class="controls {{$errors->has('image')?'has-error':''}}" >
                            <input type="file" name="image" id="image" value="{{$user_login->image}}">
                            <span class="text-danger">{{$errors->first('image')}}</span>
                             @if($user_login->image!='')
                                &nbsp;&nbsp;&nbsp;
                                <a href="javascript:" rel="{{$user_login->id}}" rel1="delete-citizenship" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                <img src="{{url('farmers/citizenship/',$user_login->image)}}" width="35" height="35" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
   <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
    <script src="{{asset('js/masked.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.form_common.js')}}"></script>
    <script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


     <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/farmer/"+deleteFunction+"/"+id;
            });
        });
        $('.textarea_editor').wysihtml5();
    </script>
@endsection