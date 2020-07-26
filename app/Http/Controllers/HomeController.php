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
        $products = Product::all();       
        return view('home', ['products' => $products]);
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
