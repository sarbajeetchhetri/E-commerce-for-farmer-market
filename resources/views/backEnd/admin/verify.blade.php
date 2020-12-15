@extends('backEnd.admin.layouts.master')
@section('title','Verify List')
@section('content')
    <div id="breadcrumb"> <a href="{{route('admin_home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/admin/verify')}}" class="current">Farmer Verification</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Farmers</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Farmers Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Grand Father</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Country</th>
                        <th>Citizenship</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($farmers as $farmer)
                            <tr class="gradeC">
                                <td style="text-align: center;">{{$farmer->name}}</td>
                                <td style="text-align: center;">{{$farmer->email}}</td>
                                <td style="text-align: center;">{{$farmer->mobile}}</td>
                                <td style="text-align: center;">{{$farmer->address}}</td>
                                <td style="text-align: center;">{{$farmer->gfname}}</td>
                                <td style="text-align: center;">{{$farmer->faname}}</td>
                                <td style="text-align: center;">{{$farmer->mname}}</td>
                                <td style="text-align: center;">{{$farmer->country}}</td>
                                <td style="text-align: center;"><img src="{{url('farmers/citizenship',$farmer->image)}}" alt="" width="50"></td>
                                <td style="text-align: center; vertical-align: middle;">
                                  <a href="#myModal{{$farmer->id}}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                                    <a href="javascript:" rel="{{$farmer->id}}" rel1="updateverification" class="btn btn-danger btn-mini deleteRecord">Verify</a>
                                </td>

                            </tr>
                            {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$farmer->id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{$farmer->name}}</h3>
                            </div>
                            <div class="modal-body">
                                <div class="text-center"><img src="{{url('farmers/citizenship',$farmer->image)}}" width="100" alt="{{$farmer->name}}"></div>
                                <p class="text-center">{{$farmer->image}}</p>
                            </div>
                        </div>
                        {{--Pop Up Model for View Product--}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
           var id=$(this).attr('rel');
           var verifyFunction=$(this).attr('rel1');
           swal({
               title:'Are you sure?',
               text:"You won't be able to revert this!",
               type:'warning',
               showCancelButton:true,
               confirmButtonColor:'#3085d6',
               cancelButtonColor:'#d33',
               confirmButtonText:'Yes, Verify Farmer!',
               cancelButtonText:'No, cancel!',
               confirmButtonClass:'btn btn-success',
               cancelButtonClass:'btn btn-danger',
               buttonsStyling:false,
               reverseButtons:true
           },function () {
              window.location.href="/admin/"+verifyFunction+"/"+id;
           });
        });
    </script>
@endsection