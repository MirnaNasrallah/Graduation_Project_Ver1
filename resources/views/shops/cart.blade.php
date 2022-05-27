@extends('layouts.app')
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu End -->
{{ View::make('header') }}
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->

<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cart->isNotEmpty())
                                @foreach ($cart as $item)
                                    <tr>
                                        <td class="cart__product__item">
                                            {{-- <img src="{{ $item->product_img }}" alt=""> --}}
                                            <div class="product__item__pic set-bg scaling"
                                                data-setbg="{{ asset('storage/images/' . $item->product_img) }}">
                                            </div>

                                            <div class="product__item__text">

                                                <h6>{{ $item->product_name }}</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ $item->price }}</td>
                                        <td class="cart__quantity">
                                            <form method="POST" action="{{ route('QtyUpdate', $item->id) }}">
                                                @csrf
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $item->quantity }}" name="quantity">
                                                </div>
                                                <button type="submit" class="mainButton"></span>
                                                    Save
                                                </button>
                                            </form>
                                        </td>
                                        <td class="cart__total">{{ $item->price }}</td>
                                        <td class="cart__total">
                                            {{ $item->subtotal }}</td>

                                        <td><a href="{{ url('deletefromcart') }}/{{ $item->id }}"><span
                                                    class="material-icons">delete</span></a></td>
                                    </tr>
                                @endforeach


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ url('/') }}">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span> Update cart</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#" method="GET">
                        {{-- {{ route('coupon') }} --}}
                        <input type="text" name="coupon" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>


                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    {{-- @if ($coupon->isNotEmpty())

                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{$item->sum('subtotal')}}</span></li>
                        @php
                            $final_price=$item->sum('subtotal')-($item->sum('subtotal')*(0.1));
                        @endphp
                        <li>Total <span>$  {{$final_price}}</span></li>
                    </ul>
                    <a href="{{ url('checkout') }}/{{ $item->id }}/{{ $item->type }}/{{ $item->quantity }}" class="primary-btn">Proceed to checkout</a>
                </div>
                @else --}}
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{ $item->sum('subtotal') }}</span></li>

                        <li>Total <span>$ {{ $item->sum('subtotal') }}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
{{-- {{ url('checkout') }}/{{ $item->id }}/{{ $item->type }}/{{ $item->quantity }}        --}}
         </div>
                        @else
                                <div
                                    style="margin-left: auto; margin-right: auto; text-align: center; padding-top:20px; background-color: #ff00003d;">
                                    <p>No products found!! Try search again.</p>
                                </div>
                            @endif
            </div>
        </div>
    </div>
</section>

<!-- Shop Cart Section End -->



<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->
