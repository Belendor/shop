{{-- {{dd($pizzas)}} --}}


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
    <div class="pizza-container container">
        <p class="cat-name">Pizza</p>
        <div class="row">
            @foreach ($pizzas as $pizza)
            
                <div class="pizza-box col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <img class="img-box" src=" {{ asset('images/'.$pizza->images)}}" alt="{{$pizza->images}}">
                    <p id="product-title" class="name-box">{{$pizza->title}}</p>
                    <p class="desciption-box">{{$pizza->description}}</p>
                    <div class="price-box">
                        <p id="product-price" class="product-price"> Nuo {{$pizza->price}} €</p>

                        <button class="axios-button" data-json='{
                        "title": "{{$pizza->title}}",
                        "price": {{$pizza->price}},
                        "id": {{$pizza->id}}
                        }' type="submit">Pasirinkti</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('snack')
    <div class="pizza-container container">
        <p class="cat-name">Snacks</p>
        <div class="row">
            @foreach ($snacks as $snack)
                <div class="pizza-box col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <img class="img-box" src=" {{ asset('images/'.$snack->images)}}" alt="{{$snack->images}}">
                    <p id="product-title" class="name-box">{{$snack->title}}</p>
                    <p class="desciption-box">{{$snack->description}}</p>
                    <div class="price-box">
                        <p id="product-price" class="product-price"> Nuo {{$snack->price}} €</p>

                        <button class="axios-button" data-json='{
                        "title": "{{$snack->title}}",
                        "price": {{$snack->price}},
                        "id": {{$snack->id}}
                        }' type="submit">Pasirinkti</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('footer')
    <div class="footer"></div>
@endsection