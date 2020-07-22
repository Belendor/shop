@extends('layouts.app')

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
