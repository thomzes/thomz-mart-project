<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function ReturnRequest()
    {
        $orders = Order::where('return_order', 1)
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.return_order.return_request', compact('orders'));

    } //end method

    public function ReturnRequestApprove($order_id)
    {
        Order::where('id', $order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function ReturnAllRequest()
    {
        $orders = Order::where('return_order',2)
                        ->orderBy('id','DESC')
                        ->get();

    	return view('backend.return_order.all_return_request',compact('orders'));

    } //end method









}
