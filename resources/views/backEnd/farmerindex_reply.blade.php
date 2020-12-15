@extends('backEnd.layouts.master')
@section('title','Farmer reply')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('farmerreplyindex')}}" class="current">Reply Feedback</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Reply</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>From</th>
                        <th>Email</th>
                        <th>Feedbacks</th>
                        <th>Your Reply</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($replies as $reply)
                            <tr class="gradeC">
                                <td style="text-align: center;">{{$reply->from_user}}</td>
                                <td style="text-align: center;">{{$reply->email}}</td>
                                <td style="text-align: center;">{{$reply->feedbacks}}</td>
                                <td style="text-align: center;">{{$reply->reply}}</td>
                                <td style="text-align: center; vertical-align: middle;">
                                <a href="{{route('farmerreplyform',$reply->id)}}" class="btn btn-primary btn-mini">Reply</a>
                                
                            </td>

                            </tr>
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
   
@endsection