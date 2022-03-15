<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
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


    public function ReturnOrder(Request $request,$order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);

        // Notification Toastr
        $notification = array(
            'message' => 'Return Request Send Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);


    } //end method




}
