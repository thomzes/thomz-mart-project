<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CashController extends Controller
{
    public function CashOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $getTotal = Cart::total();
            $removeDot = str_replace('.', '', $getTotal);
            $removeComma = str_replace(',','', $removeDot);
            $cartTotal = $removeComma / 100;

            $total_amount = $cartTotal;
        }

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',
            'currency' => 'Usd',
            'amount' => $total_amount,

            'invoice_no' => 'TOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);


        // Start Send Mail
        $invoice = Order::findOrFail($order_id);
            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
                'name' => $invoice->name,
                'email' => $invoice->email,
            ];

            Mail::to($request->email)->send(new OrderMail($data));

        // End Send Mail




        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);

        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);


    } //end method



}
