<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders()
    {  
        $orders = Order::where('user_id', Auth::id())
                        ->orderBy('id', 'DESC')
                        ->get();

        return view('frontend.user.order.order_view', compact('orders'));

    } //end method


    public function OrderDetails($order_id)
    {
        $order = Order::with('division','district','state','user')
                        ->where('id', $order_id)
                        ->where('user_id', Auth::id())
                        ->first();
        $orderItem = OrderItem::with('product')
                                ->where('order_id', $order_id)
                                ->orderBy('id', 'DESC')
                                ->get();

        return view('frontend.user.order.order_details', compact('order', 'orderItem'));


    } //end method


    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','state','user')
                        ->where('id', $order_id)
                        ->where('user_id', Auth::id())
                        ->first();
        $orderItem = OrderItem::with('product')
                                ->where('order_id', $order_id)
                                ->orderBy('id', 'DESC')
                                ->get();

        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));


        $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))
            ->setPaper('a4')
            ->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
    ]);
    return $pdf->download('invoice.pdf');




    } //end method  




}
