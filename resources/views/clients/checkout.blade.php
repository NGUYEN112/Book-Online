@extends('layouts.client-layout')
@section('client-styles')
<link rel="stylesheet" href="{{asset('/storage/styles/checkout.css')}}">
@endsection
@section('client-content')
<div class="container">
    <div class="shopping-cart">
        <!-- Title -->
        <ul class="title">
            <li id="unpaid" class="cart-tab active">Shopping Bag</li>
            <li id="payoff" class="cart-tab" >Pay Off</li>
        </ul>

        <!-- Product #1 -->
        <div id="unpaid" class="cart-content">
            @foreach($orders as $key => $order)
            <div class="item" id="{{$key + 1}}">
                <div class="buttons">
                    <i class="fal fa-times fa-2x"></i>
                </div>

                <div class="product-info">
                    <div class="image">
                        <img src="{{$order->product->product_image}}" alt="" />
                    </div>

                    <div class="description">
                        <span>{{$order->product->product_name}}</span>
                    </div>
                </div>
                <div class="quantity">
                    <button class="minus-btn" type="button" name="button" id="{{$key +1}}">
                        <img src="https://designmodo.com/demo/shopping-cart/minus.svg" alt="" />
                    </button>
                    <input type="text" class="count-product" value="{{$order->count}}" id="{{$key +1}}">
                    <button class="plus-btn" type="button" name="button" id="{{$key +1}}">
                        <img src="https://designmodo.com/demo/shopping-cart/plus.svg" alt="" />
                    </button>
                </div>

                <div class="total-price">$<span class="price" id="{{$key +1}}">{{$order->price * $order->count}}</span></div>
                <div class="checkbox"><input type="checkbox" name="choose" id="{{$key +1}}" value="{{$order->id}}"></div>
            </div>
            @endforeach
        </div>

        <div id="payoff" class="cart-content">
            @foreach($payoffs as $key => $payoff)
            <div class="item">
                <!-- <div class="buttons">
                    <i class="fal fa-times fa-2x"></i>
                </div> -->

                <div class="product-info">
                    <div class="image">
                        <img src="{{$payoff->product->product_image}}" alt="" />
                    </div>

                    <div class="description">
                        <span>{{$payoff->product->product_name}}</span>
                    </div>
                </div>
                <div class="quantity">
                    <!-- <button class="minus-btn" type="button" name="button" id="{{$key +1}}">
                        <img src="https://designmodo.com/demo/shopping-cart/minus.svg" alt="" />
                    </button> -->
                    <input type="text" class="count-product" value="{{$payoff->count}}">
                    <!-- <button class="plus-btn" type="button" name="button" id="{{$key +1}}">
                        <img src="https://designmodo.com/demo/shopping-cart/plus.svg" alt="" />
                    </button> -->
                </div>

                <div class="total-price">$<span >{{$payoff->price * $payoff->count}}</span></div>
                <div class="checkbox" style="font-size: 15px; color: #86939E">Pay Off <i class="fal fa-check "></i></div>
            </div>
            @endforeach
        </div>


        <div class="cart_price">
            TOTAL :$ <span class="cart_price-inner">0</span>
        </div>
        <div class="checkout-button">
            <button>CHECKOUT</button>
        </div>
        @csrf
    </div>
</div>
@endsection
@section('client-script')
<script src="{{asset('/storage/js/checkout.js')}}"></script>
@endsection