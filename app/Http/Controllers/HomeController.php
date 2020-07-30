<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Libs\WebToPay;
use App\Libs\WebToPayException;

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
    public function order()
    {
        return view('order');
    }

    public function payseraAccept()
    {
        try {
                $response = WebToPay::checkResponse($_GET, array(
                    'projectid'     => 181598,
                    'sign_password' => 'bef35db24f8ca98d5875aee3fdf95026',
                ));
        
                $orderId = $response['orderid'];
                $amount = $response['amount'];
                $currency = $response['currency'];

                $order = Order::where('id', $orderId)->first();

                if($amount == $order->price * 100 && $order->status == 1){
                    $order->status = 2;
                    $order->save();
                }

        } catch (Exception $e) {
                echo get_class($e) . ': ' . $e->getMessage();
        }

        return redirect()->route('all.good');
    }

    public function allGood()
    {
        return view('orders.all-good');
    }

    public function payseraCancel()
    {
        return view('order');
    }
    public function payseraCallback()
    {
        return view('order');
    }

    public function adminList()
    {   

        $products = Product::all(); 

        return view('admin.list', ['products' => $products]);
    }
}
