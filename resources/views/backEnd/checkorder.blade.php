@extends('backEnd.layouts.master')
@section('title','List Coupons')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/farmerpanel')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/farmer/checkorder')}}" class="current">Orders</a></div>
    <div class="container-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Mobile</th>
                        <th>Product Name</th>
                        <th>Qunatity(in Sack)</th>
                        <th>Payement Method</th>
                        <th>Amount(NPR)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($checkorders as $order)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="vertical-align: middle;">{{$order->id}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->users_email}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->address}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->city}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->state}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->country}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->mobile}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->product_name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->quantity}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->payment_method}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->grand_total}}</td>
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
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
   
@endsection