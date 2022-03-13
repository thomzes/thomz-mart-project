<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status', 'Pending')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.pending_orders', compact('orders'));
        
    } //end method


    // Pending Order Details
    public function PendingOrdersDetails($order_id)
    {
        $order = Order::with('division','district','state','user')
                        ->where('id', $order_id)
                        ->first();
        $orderItem = OrderItem::with('product')
                                ->where('order_id', $order_id)
                                ->orderBy('id', 'DESC')
                                ->get();

        return view('backend.orders.pending_orders_details', compact('order', 'orderItem'));


    } //end method



    // Confirmed Order
    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'Confirmed')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.confirmed_orders', compact('orders'));

    } //end method
    
    
    
    // Processing Order
    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'Processing')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.processing_orders', compact('orders'));

    } //end method
    
    
    
    // Picked Order
    public function PickedOrders()
    {
        $orders = Order::where('status', 'Picked')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.picked_orders', compact('orders'));

    } //end method
    


    // Shipped Order
    public function ShippedOrders()
    {
        $orders = Order::where('status', 'Shipped')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.shipped_orders', compact('orders'));

    } //end method
    
    
    
    // Delivered Order
    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'Delivered')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.delivered_orders', compact('orders'));

    } //end method
    
    
    
    // Delivered Order
    public function CancelOrders()
    {
        $orders = Order::where('status', 'Cancel')
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('backend.orders.cancel_orders', compact('orders'));

    } //end method



    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'Confirmed'
        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Order Confirm Successfully!',
            'alert-type' => 'info'

        );

        return redirect()->route('pending-orders')->with($notification);

    } //end method














}
