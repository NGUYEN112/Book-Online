@foreach($products as $product)
<div class="categories__product-item col-sm-2 col-3-lg col-6-lg">
    <a href="{{$product->category->category_name}}/{{$product->id}}"><img src="{{$product->product_image}}" alt=""></a>
    <h4>{{$product->product_name}}</h4>
    <h3>${{$product->product_price}}</h3>
    @foreach($discounts as $discount)

    <!-- Discount Apply to all Category -->
    @if($discount->category_id == null && $discount->the_range_from == null && $discount->the_range_to ==null))
    <div class="categories__product-item-sale">
        <div>
            <p>{{$discount->discount_value}}%</p>
            <p>Off</p>
        </div>
    </div>
    @elseif($discount->category_id == null)
    @if($discount->the_range_from != null && $discount->the_range_to != null)
    @if($discount->the_range_from <= $product->product_price && $product->product_price <= $discount->the_range_to)
            <div class="categories__product-item-sale">
                <div>
                    <p>{{$discount->discount_value}}%</p>
                    <p>Off</p>
                </div>
            </div>
            @endif
            <!-- The range from = NULL -->
            @elseif($discount->the_range_from == null)
            @if($product->product_price <= $discount->the_range_to)
                <div class="categories__product-item-sale">
                    <div>
                        <p>{{$discount->discount_value}}%</p>
                        <p>Off</p>
                    </div>
                </div>
                @endif
                <!-- End -->
                <!-- The range to = NULL -->
                @elseif($discount->the_range_to == null)
                @if($discount->the_range_from <= $product->product_price )
                    <div class="categories__product-item-sale">
                        <div>
                            <p>{{$discount->discount_value}}%</p>
                            <p>Off</p>
                        </div>
                    </div>
                    @endif
                    @endif
                    <!--Check Category not null -->
                    @else
                    <!-- If discount have both the range from and end -->
                    @if($discount->the_range_from != null && $discount->the_range_to != null )
                    @if($discount->the_range_from <= $product->product_price && $product->product_price <= $discount->the_range_to)
                            @if($discount->group_id == $product->group_id || $discount->group_id == null )
                            @if($discount->genre_id == $product->genre_id || $discount->genre_id == null)
                            <div class="categories__product-item-sale">
                                <div>
                                    <p>{{$discount->discount_value}}%</p>
                                    <p>Off</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @endif
                            <!-- If don't have both range -->
                            @elseif($discount->the_range_from == null && $discount->the_range_to == null )
                            @if($discount->group_id == $product->group_id || $discount->group_id == null )
                            @if($discount->genre_id == $product->genre_id || $discount->genre_id == null)
                            <div class="categories__product-item-sale">
                                <div>
                                    <p>{{$discount->discount_value}}%</p>
                                    <p>Off</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @elseif ($discount->the_range_from == null || $discount->the_range_to == null )
                            @if($discount->the_range_from == null && $product->product_price <= $discount->the_range_to)
                                @if($discount->group_id == $product->group_id || $discount->group_id == null )
                                @if($discount->genre_id == $product->genre_id || $discount->genre_id == null)
                                <div class="categories__product-item-sale">
                                    <div>
                                        <p>{{$discount->discount_value}}%</p>
                                        <p>Off</p>
                                    </div>
                                </div>
                                @endif
                                @endif
                                @elseif( $discount->the_range_to == null && $discount->the_range_from <= $product->product_price)
                                    @if($discount->group_id == $product->group_id || $discount->group_id == null )
                                    @if($discount->genre_id == $product->genre_id || $discount->genre_id == null)
                                    <div class="categories__product-item-sale">
                                        <div>
                                            <p>{{$discount->discount_value}}%</p>
                                            <p>Off</p>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endif
                                    @endif
                                    @endif
                                    <!-- End -->
                                    @endforeach
</div>
@endforeach

<!-- End Second Tabs Content -->


<!--  -->

<div class="categories__product-pagination">
    <ul>
        {{ $products->links() }}
        <!-- <li><a href="#">1</a></li> -->
        <!-- <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li> -->
    </ul>
</div>