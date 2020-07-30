@extends('layouts.app')

@section('cart')

    <div class="cart-box">
    </div>

@endsection
 
@section('content')



<div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="{{route('order.post')}}" method="POST">
            @csrf
            Name:<input type="text" name="name" value=""><br><br>
            Email:<input type="text" name="email" value=""><br><br>
            Phone:<input type="text" name="phone" value=""><br><br>
            <button class="add-button" type="submit">BUY PIZZA</button>
        </form>
      </div>
    </div>
  </div>





@endsection