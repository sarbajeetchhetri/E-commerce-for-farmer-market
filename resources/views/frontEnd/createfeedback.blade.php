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
                    <form action="{{route('supplieraddfeedbacks')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <label class="control-label">To :</label>
                            <div class="controls">
                                 <select name="to_user" value="{{old('to_user')}}">
                                    <option value="admin">Admin</option>
                                    <option value="farmer">Farmer</option>
                                 </select> 
                                <span class="text-danger" style="color: red;">{{$errors->first('to_user')}}</span>
                            </div>
                            <label for="description" class="control-label">Feedbacks :</label>
                        <div class="controls">
                            <textarea class="textarea_editor span12" name="feedbacks" id="feedbacks" rows="6" placeholder="Your Feedbacks">{{old('feedbacks')}}</textarea>
                            <span class="text-danger">{{$errors->first('feedbacks')}}</span>
                        </div>
                        <input type="hidden" name="from_user" value="supplier" />
                        
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection