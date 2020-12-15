@extends('frontEnd.layouts.master')
@section('title','Add Feedback')
@section('slider')
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Send Your Feedback !!</h2>
                    <form action="{{route('supplierreplied','$replyid->id')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                         {{method_field("PUT")}}
                    <input type="hidden" name="id" value="{{$replyid->id}}">

                     <label for="description" class="control-label">Reply Message :</label>
                        <div class="controls">
                            <textarea class="textarea_editor span12" name="reply" id="reply" rows="6" placeholder="Your Reply">{{old('reply')}}</textarea>
                            <span class="text-danger">{{$errors->first('reply')}}</span>
                        </div>
                        <input type="hidden" name="from_user" value="supplier" />
                        
                        <button type="submit" class="btn btn-default{{$menu_active==13? 'active':''}}">Send</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection