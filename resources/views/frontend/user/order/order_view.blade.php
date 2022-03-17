@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            
            {{-- START USER SIDEBAR --}}
            @include('frontend.common.user_sidebar')
            {{-- END USER SIDEBAR --}}

            <div class="col-md-2">

            </div>


            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background: #e2e2e2">
                                <td class="col-md-1">
                                    <label for="">Date</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">Total</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">Payment</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Order</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">Action</label>
                                </td>
                            </tr>


                            @foreach ($orders as $order)
                            <tr>
                                <td class="col-md-1">
                                    <label for="">{{ $order->order_date }}</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">${{ $order->amount }}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">{{ $order->payment_method }}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">{{ $order->invoce_no }}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">

                                        @if($order->status == 'Pending')        
                                            <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                                        @elseif($order->status == 'Confirm')
                                            <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>
                                        @elseif($order->status == 'Processing')
                                            <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>
                                        @elseif($order->status == 'Picked')
                                            <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
                                        @elseif($order->status == 'Delivered')
                                            <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
                                        @else
                                            <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>

                                        @endif

                                    </label>
                                </td>

                                <td class="col-md-1">
                                    <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>

                                    <a target="_blank" href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i>Invoice</a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>

            </div>

        </div> 
    </div> 
</div>


@endsection
