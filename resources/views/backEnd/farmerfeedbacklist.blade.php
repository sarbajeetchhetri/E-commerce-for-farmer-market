@extends('backEnd.layouts.master')
@section('title','Farmer Feedback List')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('farmerfeedbacklists')}}" class="current">Feedback Lists</a></div>
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Feedback Lists</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Feedbacks To</th>
                        <th>Feedbacks</th>
                        <th>Reply</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                            <tr class="gradeC">
                                <td style="text-align: center;">{{$list->to_user}}</td>
                                <td style="text-align: center;">{{$list->feedbacks}}</td>
                                <td style="text-align: center;">{{$list->reply}}</td>
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