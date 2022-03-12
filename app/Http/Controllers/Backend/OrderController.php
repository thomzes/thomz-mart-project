<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
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










}
