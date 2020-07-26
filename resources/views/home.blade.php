@extends('layouts.app')


@section('cart')

    <div class="cart-box">
    </div>

@endsection


@section('content')
    <div class="shop-main-container">

        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div id="slide1" class="swiper-slide"></div>
                <div id="slide2" class="swiper-slide"></div>
                <div id="slide3" class="swiper-slide"></div>
                <div id="slide4" class="swiper-slide"></div>
    
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
    
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
    
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>

@endsection

@section('pizza')
    <div class="pizza-container">

        @foreach ($products as $product)

             <div class="pizza-box">
                 <img class="img-box" src=" {{ asset('images/'.$product->images)}}" alt="{{$product->images}}">
                 <p id="product-title" class="name-box">{{$product->title}}</p>
                 <p class="desciption-box">{{$product->description}}</p>
                 <div class="price-box">
                     <p id="product-price"> Nuo {{$product->price}} €</p>

                    <button class="axios-button" data-json='{
                    "title": "{{$product->title}}", 
                    "price": {{$product->price}},
                    "id": {{$product->id}}
                    }' type="submit">Pasirinkti</button>

                 </div>
             </div>
            
        @endforeach

    </div>
@endsection