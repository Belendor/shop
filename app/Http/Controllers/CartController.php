<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
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

    public function session(Request $request)
    {

      if(session("cart")){
    
        $cart = session()->get("cart");

        if(isset($cart[$request->id])){

            $cart[$request->id] =  ["title" => $request->title,
                                    "price" => $request->price,
                                    "count" => $cart[$request->id]['count'] + 1];

            session(["cart" => $cart]);
        }else{

            $cart[$request->id] =  ["title" => $request->title,
                                    "price" => $request->price,
                                    "count" => 1];
                              
            session(["cart" => $cart]);
        }

      }else{
        session(["cart" => [$request->id => [ "title" => $request->title,
                                              "price" => $request->price,
                                              "count" => 1 ]]]);
      } 

        return session()->get("cart");
    } 

    public function sessionGet()
    {
        return session()->get("cart");
    }   
    public function sessionRemove(Request $request)
    {
        $cart = session()->get("cart");
        
        unset($cart[$request->id]);

        session(["cart" => $cart]);
        
        return session()->get("cart");

    }

    public function sessionAdd(Request $request)
    {
        $cart = session()->get("cart");
        
        
        $cart[$request->id] =  ["title" => $cart[$request->id]['title'],
                                "price" => $cart[$request->id]['price'],
                                "count" => $cart[$request->id]['count'] + 1];
     

        session(["cart" => $cart]);
        
        return session()->get("cart");

    }   
    public function sessionSubstract(Request $request)
    {
        $cart = session()->get("cart");
        
        if( $cart[$request->id]['count'] > 1){
            
            $cart[$request->id] =  ["title" => $cart[$request->id]['title'],
                                    "price" => $cart[$request->id]['price'],
                                    "count" => $cart[$request->id]['count'] - 1];
         
            session(["cart" => $cart]);

        }
        
        return session()->get("cart");

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
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
