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
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Main Page</a>
                    <span>Search</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<section class="shop spad">

    <div class="card-row row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <div class="col-lg-9 col-md-9">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <div class="product__item">
                        <form action="{{ route('search') }}" method="GET">
                            <input type="text" name="search" class=" search-model-form input" />
                            <button type="submit" class="icon_search search-switch"></button>
                        </form>
                        @if ($product->isNotEmpty())

                            @foreach ($product as $item)
                                @if ($item->sale > 0)
                                    <div class="product__item sale">
                                        <div class="product__item__pic set-bg scaling"
                                            data-setbg="{{ asset('storage/images/' . $item->product_img) }}">
                                            <div class="label sale">Sale {{ $item->sale }}%</div>
                                            <ul class="product__hover">
                                                <li><a href="{{ asset('storage/images/' . $item->product_img) }}"
                                                        class="image-popup"><span class="arrow_expand"></span></a>
                                                </li>
                                                <li><a
                                                        href="{{ url('addtowishlist') }}/{{ $item->id }}/{{ $item->price }}/{{ $item->type }}"><span
                                                            class="icon_heart_alt"></span></a></li>
                                                <li><a
                                                        href="{{ url('addtoCart') }}/{{ $item->id }}/{{ $item->price }}/{{ $item->type }}"><span
                                                            class="icon_bag_alt"></span></a></li>

                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $item->product_name }}</a></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product__price">$ {{ $item->price }}
                                                <span>$ {{ ($item->price * 100) / (100 - $item->sale) }}</span>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/images/' . $item->product_img) }}">
                                            <ul class="product__hover">
                                                <li><a href="{{ asset('storage/images/' . $item->product_img) }}"
                                                        class="image-popup"><span class="arrow_expand"></span></a>
                                                </li>
                                                <li><a
                                                        href="{{ url('addtowishlist') }}/{{ $item->id }}/{{ $item->price }}/{{ $item->type }}"><span
                                                            class="icon_heart_alt"></span></a></li>
                                                <li><a
                                                        href="{{ url('addtoCart') }}/{{ $item->id }}/{{ $item->price }}/{{ $item->type }}"><span
                                                            class="icon_bag_alt"></span></a></li>

                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $item->product_name }}</a></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product__price">${{ $item->price }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div
                                style="margin-left: auto; margin-right: auto; text-align: center; padding-top:20px; background-color: #ff00003d;">
                                <p>No products found!! Try search again.</p>
                            </div>
                        @endif
























                        {{-- <div class="product__item__pic set-bg" data-setbg="{{ $item->product_img }}">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="img/shop/shop-1.jpg" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="{{ url('addtowishlist') }}/{{ $item->id }}"><span
                                            class="icon_heart_alt"></span></a></li>
                                <li><a href="{{ url('addtocart') }}/{{ $item->id }}"><span
                                            class="icon_bag_alt"></span></a></li>

                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $item->product_name }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">${{ $item->price }}</div>
                        </div>

                </div>
                @endforeach --}}


                    </div>


                </div>


            </div>
            {{-- @endforeach --}}
            {{-- </div> --}}
        </div>
</section>
{{ View::make('footer') }}
