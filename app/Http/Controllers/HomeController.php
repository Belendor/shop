<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $pizzas = [];
        $snacks = [];
        $products = Product::all();       

        foreach($products as $product){
            $categories = $product->cats;
            
            $singleCats = explode(", ", $categories);

            if(is_array($singleCats)){
                foreach($singleCats as $cat){
                    if($cat == 'pizza'){
                        array_push($pizzas, $product);
                    }
                    if($cat == 'snack'){
                        array_push($snacks, $product);
                    }
                }    
            }else{
                if($singleCats == 'pizza'){
                    array_push($pizzas, $product);
                }
                if($singleCats == 'snack'){
                    array_push($snacks, $product);
                }
            }   
        }

        return view('home', ['pizzas' => $pizzas], ['snacks' => $snacks]);
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function adminList()
    {   

        $products = Product::all(); 

        return view('admin.list', ['products' => $products]);
    }
}
