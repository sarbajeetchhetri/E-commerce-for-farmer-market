@extends('backEnd.admin.layouts.master')
@section('title','Add Country')
@section('content')
    <div id="breadcrumb"> <a href="{{route('admin_home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('countryhome')}}" class="current" >Add New Countries</a> </div>
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
                    <h5>Add New Country</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{route('addcountry')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="control-group">
                            <label class="control-label">Country Code :</label>
                            <div class="controls">
                                <input type="text" name="country_code" id="ccode" value="{{old('country_code')}}" required/>
                                <span class="text-danger" style="color: red;">{{$errors->first('country_code')}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Country Name :</label>
                            <div class="controls">
                                <input type="text" name="country_name" id="cname" value="{{old('country_name')}}"
                             required/>
                             <span class="text-danger" style="color: red;">{{$errors->first('country_name')}}</span>
                            </div>
                        </div>

                        <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add New Country</button>
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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/matrix.js') }}"></script>
    <script src="{{ asset('js/matrix.form_validation.js') }}"></script>
    <script src="{{ asset('js/matrix.tables.js') }}"></script>
    <script src="{{ asset('js/matrix.popover.js') }}"></script>
@endsection