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










}
