<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
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



    public function ConfirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'Processing']);

      $notification = array(
			'message' => 'Order Processing Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('confirmed-orders')->with($notification);

    } //end method



    public function ProcessingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'Picked']);
  
        $notification = array(
              'message' => 'Order Picked Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('processing-orders')->with($notification);
  
    } // end method



    public function PickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'Shipped']);
  
        $notification = array(
              'message' => 'Order Shipped Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('picked-orders')->with($notification);
  
    } // end method




    public function ShippedToDelivered($order_id)
    {
        $product = OrderItem::where('order_id', $order_id)->get();
        foreach($product as $item) {
            Product::where('id', $item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        }





        Order::findOrFail($order_id)->update(['status' => 'Delivered']);
  
        $notification = array(
              'message' => 'Order Delivered Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('shipped-orders')->with($notification);
  
    } // end method




    // PDF
    public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')
                        ->where('id',$order_id)->first();
                        
    	$orderItem = OrderItem::with('product')
                                ->where('order_id',$order_id)
                                ->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))
                    ->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method 


















}
