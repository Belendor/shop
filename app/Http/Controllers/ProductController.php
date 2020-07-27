<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tag;
use App\Cat;
use Illuminate\Http\Request;

class ProductController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();

        $product->title =  $request->prod_title;
        $product->price =  $request->prod_price;
        $product->sale =  $request->prod_sale;
        $product->description =  $request->prod_describtion;

        if ($request->hasFile('picture')) {

            $image = $request->file('picture');

            $name = $request->file('picture')->getClientOriginalName();

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $product->images = $name;
        }

        $tagString = '';

        
        if(count($request->tags) == 1 ){
            $tagString .= $request->tags[0];
        }else{
            for($i = 0; $i<count($request->tags); $i++){
                if($i == 0){
                    $tagString .= $request->tags[$i];
                }else{
                    $tagString .= ', '.$request->tags[$i];
                }
            }
        }
        $catString = '';

        if(count($request->cats) == 1 ){
            $catString .= $request->cats[0];
        }else{
            for($i = 0; $i<count($request->cats); $i++){
                if($i == 0){
                    $catString .= $request->cats[$i];
                }else{
                    $catString .= ', '.$request->cats[$i];
                }
            }
        }

        $product->cats = $catString;
        $product->tags = $tagString;

        $product->save();

        return redirect()->back()->with('success_message', 'Product added succesfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
