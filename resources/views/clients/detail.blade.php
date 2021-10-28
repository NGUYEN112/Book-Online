@extends('layouts.client-layout')

@section('client-content')
<section class="flow">
    <div class="container ">
        <div class="flow__inner">
            <p>Home <i class="far fa-chevron-double-right"></i>
                {{$product->category->category_name}} <i class="far fa-chevron-double-right"></i>
                {{$product->group->group_name}}<i class="far fa-chevron-double-right"></i>
                {{$product->genre->genre_name}}
            </p>
        </div>
    </div>
</section>

<section class="product">
    <div class="container">
        <div class="product__container">
            <div class="product__inner row">
                <img class="product__image col-3 cart" src="{{$product->product_image}}" alt="">
                <div class="product__detail col-9">
                    <h4 class="product__detail-name">
                        {{$product->product_name}}
                    </h4>
                    <p class="product__detail-content">
                        {{$product->product_content}}
                    </p>
                    <div class="product__detail-cart">
                        <div class="product__detail-cart-paying row items">
                            <div class="product__detail-cart-price col-6">
                                <h2>Our price : $<span class="product-price">{{ $discount != null ? ($product->product_price * $discount->discount_value / 100) : $product->product_price}}</span></h2>
                                @if($discount != null)
                                <h4>Was ${{$product->product_price}} Save {{$discount->discount_value}}%</h4>
                                @endif
                            </div>
                            <div class="product__detail-cart-button col-6">
                                <input type="number" class="product_id" hidden value="{{$product->id}}">
                                <input type="number" class="discount_id" hidden value="{{$discount != null ? $discount->id : null}}">
                                @if(auth()->user())
                                <button class="product__detail-cart-add my-btn">
                                    Add to cart
                                </button>
                                @csrf
                                @else
                                <a href="/auth/login" style="font-size:16px; color:red; text-decoration: underline; font-weight:400;">
                                Sign In to continued</a>
                                @endif
                            </div>
                        </div>
                        <div class="product__detail-cart-line"></div>
                        <p><i class="fas fa-lock"></i> Safe, Secure Shoping</p>
                        <div class="product__detail-cart-credit">
                            <img src="{{asset('/storage/images/footer/crc1.jpg')}}" alt="">
                            <img src="{{asset('/storage/images/footer/crc2.png')}}" alt="">
                            <img src="{{asset('/storage/images/footer/cr3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="more">
    <div class="container">
        <div class="more__inner row">
            <div class="more__contact col-9">
                <div class="more__contact-information">
                    <ul class="more__contact-information-func tabs">
                        <li class="tab-link active" id="info">Product information</li>
                        <li class="tab-link" id="other">Other Details</li>
                    </ul>
                    <div id="info" class="more__contact-information-description tab-content">
                        <p>{{$product->product_info}}
                        </p>
                    </div>
                    <div id="other" class="more__contact-information-description tab-content">
                        <p>{{$product->other_detail}}
                        </p>
                    </div>
                </div>
                <div class="more__contact-review">
                    <h1 class="more__contact-review-title">
                        Product Review
                    </h1>
                    @foreach($comments as $comment)
                    <div class="more__contact-review-comment ">
                        <div class="more__contact-review-comment-user ">
                            <img src="{{asset('/storage/images/avt.jpg')}}" alt="">

                        </div>
                        <div class="more__contact-review-comment-content">
                            {{$comment->comment_content}}
                        </div>
                    </div>
                    @endforeach
                    <div class="more__contact-review-line"></div>

                    <h1 class="more__contact-review-title">
                        Write a comment
                    </h1>
                    <form method="post" >
                        @csrf
                        <div class="more__contact-review-create">
                            <div class="more__contact-review-create-item ">
                                <label class="" for="name">Your name</label>
                                <input placeholder="Your name..." type="text" id="name" value="{{ auth() ? auth()->user()->full_name : ''}}">
                            </div>
                            <div class="more__contact-review-create-item ">
                                <label class="" for="email">Email</label>
                                <input placeholder="Email..." type="text" id="email" value="{{ auth() ? auth()->user()->email : ''}}">
                            </div>
                            <input type="text" hidden disabled value="{{ auth() ? auth()->user()->id : ''}}">
                            <div class="more__contact-review-create-item ">
                                <label class="" for="message">Message</label>
                                <textarea name="comment_content" placeholder="Message..." name="comment_content" id="message" cols="30" rows="10"></textarea>
                            </div>
                            @if(auth())
                            <button type="submit">Submit</button>
                            @else
                            <a style="float: right; font-size: 1.7rem; line-height:1.7; color:red; text-decoration: underline;" href="/auth/login">Sign In to continued</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="more__product col-lg-3 " id="exampleSliderProduct">
                <h2 class="more__product-title">
                    You may also like
                </h2>
                <div class="MS-controls">
                    <button class="MS-left"><i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></button>
                    <button class="MS-right"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></button>
                </div>
                <ul class="more__product-list MS-content">
                    @foreach($products as $product)
                    <li class="more__product-item item">
                        <a href="detail/{{$product->id}}"><img src="{{$product->product_image}}" alt=""></a>
                        <div class="more__product-item-info">
                            <h3>{{$product->product_name}}</h3>
                            <h2>${{$product->product_price}}</h2>
                            <a href="detail/{{$product->id}}">Read more</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
