@extends('frontEnd.layouts.master')
@section('title','Feedback Lists')
@section('slider')
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td>From</td>
                        <td>Email</td>
                        <td>Feedbacks</td>
                        <td>Your Reply</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($replies as $reply)
                            <tr>
                                <td>
                                   {{$reply->from_user}}
                                </td>
                                <td>
                                    {{$reply->email}}
                                </td>
                                <td>
                                    {{$reply->feedbacks}}
                                </td>
                                <td>
                                    {{$reply->reply}}
                                </td>
                                <td>
                                   <a href="{{route('supplierreplyform',$reply->id)}}" class="btn btn-primary btn-mini">Reply</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    
@endsection