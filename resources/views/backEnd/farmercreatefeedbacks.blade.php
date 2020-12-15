@extends('backEnd.layouts.master')
@section('title','add farmer feedbacks')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('farmerfeedbackpage')}}" class="current" >Add Feedbacks</a> </div>
    <div class="container-fluid">
         @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Feedbacks</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{route('farmeraddfeedbacks')}}"  name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="control-group">
                            <label class="control-label">To :</label>
                            <div class="controls">
                                 <select name="to_user" value="{{old('to_user')}}" style="width: 415px;">
                                    <option value="admin">Admin</option>
                                    <option value="supplier">Suppliers</option>
                                 </select> 
                                <span class="text-danger" style="color: red;">{{$errors->first('to_user')}}</span>

                            </div>
                        </div>
                        <div class="control-group">
                        <label for="description" class="control-label">Feedbacks :</label>
                        <div class="controls">
                            <textarea class="textarea_editor span12" name="feedbacks" id="feedbacks" rows="6" placeholder="Your Feedbacks" style="width: 580px;">{{old('feedbacks')}}</textarea>
                            <span class="text-danger">{{$errors->first('feedbacks')}}</span>
                        </div>
                    </div>
                    <input type="hidden" name="from_user" value="farmer" />

                        <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add Feedbacks</button>
                        </div>
                    </div>
                       
                    </form>
                </div>
            </div>
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
    <script>
        $('.textarea_editor').wysihtml5();
    </script>
@endsection