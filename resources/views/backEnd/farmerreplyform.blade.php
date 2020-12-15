@extends('backEnd.layouts.master')
@section('title','Farmer Replyform')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('farmerreplyindex')}}">Reply Feedback</a> <a href="{{route('farmerreplyform','$replyid->id')}}" class="current">Reply Form</a> </div>
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Reply Form</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{route('farmerreplied','$replyid->id')}}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <input type="hidden" name="id" value="{{$replyid->id}}">
                    <div class="control-group">
                        <label for="description" class="control-label"  style="font-weight: bold;">Reply Message:</label>
                        <div class="controls">
                            <textarea class="textarea_editor span12" name="reply" id="reply" rows="6" placeholder="Your Reply" value="{{old('reply')}}" required="required"  style="width: 580px;"> </textarea>
                            <span class="text-danger">{{$errors->first('reply')}}</span>
                        </div>
                    </div>
        
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Send</button> 
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

   
@endsection