@extends('layouts.app')
 
@section('content')

<form action="{{route('order.post')}}" method="POST">
    @csrf
    Name:<input type="text" name="name" value=""><br><br>
    Email:<input type="text" name="email" value=""><br><br>
    Phone:<input type="text" name="phone" value=""><br><br>
    <button class="add-button" type="submit">BUY PIZZA</button>
</form>

@endsection