@extends('layouts.app')

@section('pizza')
    <div class="pizza-container">

        @foreach ($products as $product)

             <div class="pizza-box">
                 <img class="img-box" src=" {{ asset('images/'.$product->images)}}" alt="{{$product->images}}">
                 <p class="name-box">{{$product->title}}</p>
                 <p class="desciption-box">{{$product->description}}</p>
                 <div class="price-box">
                    Nuo {{$product->price}} €
                    <button class="default-button">Pasirinkti</button>
                 </div>
             </div>
            
        @endforeach

    </div>
@endsection