<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\Libs\WebToPay;
use App\Libs\WebToPayException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function order(Request $request)
    {

        $buyCart = session()->get("cart");

        $order = new Order;
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_phone = $request->phone;
        $order->status = 1;

        $orderSum = 0;

        foreach($buyCart as $product){
            $orderSum += $product['price'] * $product['count'];
        }

        $order->price = $orderSum;
        $order->save();
        
        try {
        
            return redirect(WebToPay::redirectToPayment(array(
                'projectid'     => 181598,
                'sign_password' => 'bef35db24f8ca98d5875aee3fdf95026',
                'orderid'       => $order->id,
                'amount'        => $order->price * 100,
                'currency'      => 'EUR',
                'country'       => 'LT',
                'accepturl'     => route('paysera.accept'),
                'cancelurl'     => route('paysera.cancel'),
                'callbackurl'   => route('paysera.callback'),
                'test'          => 1,
            )));
        } catch (WebToPayException $e) {
            // handle exception
        } 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
