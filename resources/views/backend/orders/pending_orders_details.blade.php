@extends('admin.admin_master')

@section('admin')

<div class="container-full">

  <div class="content-header">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="page-title">Order Details</h3>
        <div class="d-inline-block align-items-center">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
              <li class="breadcrumb-item" aria-current="page">Order Details</li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>



    <!-- Main content -->
    <section class="content">
      <div class="row"> 

        <div class="col-md-6 col-12">
          <div class="box box-bordered border-primary">
            <div class="box-header with-border">
            <h4 class="box-title"><strong>Shipping Details</strong></h4>
            </div>
            <div class="box-body">

              <table class="table">
                <tr>
                    <th>Shipping Name : </th>
                    <th>{{ $order->name }}</th>
                </tr>

                <tr>
                    <th>Shipping Phone : </th>
                    <th>{{ $order->phone }}</th>
                </tr>

                <tr>
                    <th>Shipping Email : </th>
                    <th>{{ $order->email }}</th>
                </tr>

                <tr>
                    <th>Division : </th>
                    <th>{{ $order->division->division_name }}</th>
                </tr>

                <tr>
                    <th>District : </th>
                    <th>{{ $order->district->district_name }}</th>
                </tr>

                <tr>
                    <th>State : </th>
                    <th>{{ $order->state->state_name }}</th>
                </tr>

                <tr>
                    <th>Post Code : </th>
                    <th>{{ $order->post_code }}</th>
                </tr>
                
                <tr>
                    <th>Order Date : </th>
                    <th>{{ $order->order_date }}</th>
                </tr>

            </table>


            </div>
          </div>
        </div>
        {{-- end col md 6 --}}

          <div class="col-md-6 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
              <h4 class="box-title"><strong>Order Details </strong><span class="text-danger">Invoice : #{{ $order->invoice_no }}</span></h4>
              </div>
              <div class="box-body">

                <table class="table">
                  <tr>
                      <th>Name : </th>
                      <th>{{ $order->user->name }}</th>
                  </tr>

                  <tr>
                      <th>Phone : </th>
                      <th>{{ $order->user->phone }}</th>
                  </tr>

                  <tr>
                      <th>Payment Type : </th>
                      <th>{{ $order->payment_method }}</th>
                  </tr>

                  <tr>
                      <th>Tranx ID : </th>
                      <th>{{ $order->transaction_id }}</th>
                  </tr>

                  <tr>
                      <th>Invoice : </th>
                      <th class="text-danger">#{{ $order->invoice_no }}</th>
                  </tr>

                  <tr>
                      <th>Order Total : </th>
                      <th>${{ $order->amount }}</th>
                  </tr>

                  <tr>
                      <th>Order : </th>
                      <th>
                          <span class="badge badge-pill badge-warning" style="background: #418DB9">{{ $order->status }}</span>
                      </th>
                  </tr>

                  <tr>
                      <th></th>
                      <th>
                        @if ($order->status == 'Pending')
                          <a href="{{ route('pending-confirm', $order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                            
                        @endif 


                      </th>
                  </tr>
                  
              </table>


              </div>
            </div>
          </div>
          {{-- end col md 6 --}}
            
            <div class="col-md-12 col-12">
              <div class="box box-bordered border-primary">
                <div class="box-header with-border">
                <h4 class="box-title"><strong>Product</strong></h4>
                </div>
                <div class="box-body">

                  <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <label for="">Image</label>
                            </td>

                            <td>
                                <label for="">Product Name</label>
                            </td>

                            <td>
                                <label for="">Product Code</label>
                            </td>

                            <td>
                                <label for="">Color</label>
                            </td>

                            <td>
                                <label for="">Size</label>
                            </td>

                            <td>
                                <label for="">Quantity</label>
                            </td>

                            <td>
                                <label for="">Price</label>
                            </td>
                        </tr>


                        @foreach ($orderItem as $item)
                        <tr>
                            <td>
                                <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px" width="50px" alt=""></label>
                            </td>

                            <td>
                                <label for="">{{ $item->product->product_name_en }}</label>
                            </td>

                            <td>
                                <label for="">{{ $item->product->product_code }}</label>
                            </td>

                            <td>
                                <label for="">{{ $item->color }}</label>
                            </td>

                            <td>
                                <label for="">{{ $item->size }}</label>
                            </td>
                            
                            <td>
                                <label for="">{{ $item->qty }}</label>
                            </td>

                            <td>
                                <label for="">${{ $item->price * $item->qty }}</label>
                            </td>
                           
                        </tr>
                        @endforeach



                    </tbody>
                </table>

                @if($order->status !== "delivered")
            
                @else

                <div class="form-group">
                    <label for="label">Order Return Reason: </label>
                    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>

                </div>

                @endif



                </div>
              </div>
            </div>
            {{-- end col md 12 --}}



        

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
</div>


@endsection