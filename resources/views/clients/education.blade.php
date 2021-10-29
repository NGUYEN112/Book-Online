@extends('layouts.client-layout')

@section('client-content')
<!-- Banner start -->
<section class="banner">
    <ul class="container banner__inner row">
        <li class="banner__slide col-9">
            <div id="exampleSlider">
                <div class="MS-content">
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>
                    <div class="item"><img src="images/banner/slide.jpg" alt=""></div>

                </div>
                <div class="MS-controls">
                    <button class="MS-left"><i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></button>
                    <button class="MS-right"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></button>
                </div>
            </div>
        </li>
        <li class="banner__item col-3">
            <h2 class="banner__item-title">Deal of the Month</h2>
            <p class="banner__item-subtitle">The Human Face of Big Data</p>
            <img src="images/banner/item.png" alt="">
            <h4 class="banner__item-discount">Save 45% Today</h4>
            <h2 class="banner__item-price">$27.50</h2>
            <div class="banner__item-button">
                <button> Buy now</button>
            </div>
        </li>
    </ul>
</section>
<!-- Banner End -->

<section class="categories">
    <div class="container categories__inner row">
        <div class="btn">
            <span class="fas fa-chevron-right"></span>
        </div>
        <div class="categories__category sidebar col-3">
            <ul class="categories__category-list">
                <li class="categories__category-item ">Categories</li>
                <li class="categories__category-item-parent {{ (request()->segment(2) == '') ? 'sidebar-active' : '' }}"><a href="/Education"> All</a></li>
                @foreach($groups as $group)
                <li class="categories__category-item-parent ">
                    <a href="javascript:;" onclick="loadProductOfGroup(`{{$group->group_id}}`)">{{$group->group->group_name}}</a>
                </li>
                @foreach($group['genres'] as $genre)
                <li class="categories__category-item-child">
                    <a href="javascript:;" onclick="loadProductOfGenre(`{{$group->group_id}}`,`{{$genre->id}}`)">{{$genre->genre_name}}</a>
                </li>
                @endforeach
                @endforeach
            </ul>
        </div>
        <div class="categories__product col-lg-9">
            <div class="categories__product-header">
                <ul class="tabs">
                    <li class="tab-link active" id="seller">Best sellers</li>
                    <li class="tab-link" id="news">New Arrivals</li>
                    <li class="tab-link" id="users">Used Books</li>
                    <li class="tab-link" id="special">Special Offers</li>
                </ul>
            </div>
            <div class="categories__product-list">
                <div class="categories__product-list-inner row tab-content" id="seller">
                    @foreach($products as $product)
                    <div class="categories__product-item col-sm-2 col-3-lg col-6-lg">
                        <a href="detail/{{$product->id}}"><img src="{{$product->product_image}}" alt=""></a>
                        <h4>{{$product->product_name}}</h4>
                        <h3>$ {{$product->product_price}}</h3>
                        @foreach($discounts as $discount)

                        <!-- Discount Apply to all Category -->
                        @if($discount->genre_id == $product->genre_id )
                        <div class="categories__product-item-sale">
                            <div>
                                <p>{{$discount->discount_value}}%</p>
                                <p>Off</p>
                            </div>
                        </div>
                        @elseif($discount->group_id == $product->group_id )
                        <div class="categories__product-item-sale">
                            <div>
                                <p>{{$discount->discount_value}}%</p>
                                <p>Off</p>
                            </div>
                        </div>
                        @elseif($discount->category_id == $product->category_id )
                        <div class="categories__product-item-sale">
                            <div>
                                <p>{{$discount->discount_value}}%</p>
                                <p>Off</p>
                            </div>
                        </div>
                        @elseif($discount->category_id == null)
                        <div class="categories__product-item-sale">
                            <div>
                                <p>{{$discount->discount_value}}%</p>
                                <p>Off</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        

                      
                        
                    </div>
                    @endforeach
                    <div class="categories__product-pagination">
                            <ul>
                            {{$products->links('vendor.pagination.bootstrap-4')}}
                                <!-- <li><a href="#">1</a></li> -->
                                <!-- <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li> -->
                            </ul>
                        </div>

                </div>
            </div>
</section>
<script>
    function loadProductOfGroup(id) {
        $.ajax({
            url: '/Education/' + id,
            success: function(xml) {
                $('.tab-content').html(xml);
            },
            error: function(error) {
                console.log("Xảy ra lỗi: " + error.message)
            }
        })
    }

    function loadProductOfGenre(id, genre_id) {

        $.ajax({
            url: '/Education/' + id + '/' + genre_id,
            success: function(xml) {
                $('.tab-content').html(xml);
            },
            error: function(error) {
                console.log("Xảy ra lỗi: " + error.message)
            }
        })
    }
</script>
@endsection