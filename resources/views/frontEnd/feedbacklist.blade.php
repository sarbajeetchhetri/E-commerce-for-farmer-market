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
                        <td>Feedbacks To</td>
                        <td>Feedbacks</td>
                        <td>Reply</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <td>
                                   {{$list->to_user}}
                                </td>
                                <td>
                                    {{$list->feedbacks}}
                                </td>
                                <td>
                                    {{$list->reply}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    
@endsection