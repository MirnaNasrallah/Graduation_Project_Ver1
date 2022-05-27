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
                    <span>Foodie</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne">Type</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="{{ route('shopDesserts') }}">Desserts</a></li>
                                                <li><a href="{{ route('shopSnacks') }}">Snacks</a></li>
                                                <li><a href="{{ route('shopVeggies') }}">Veggies</a></li>
                                                <li><a href="{{ route('shopFruits') }}">Fruit</a></li>
                                                <li><a href="{{ route('shopDressings') }}">Dressings</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Calories</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="{{ route('shopLowCal') }}">Low calories</a></li>
                                                <li><a href="{{ route('shopMidCal') }}">Mid calories</a></li>
                                                <li><a href="{{ route('shopHighCal') }}">High calories</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="sidebar__filter">
                        <div class="section-title">
                            <h4>Shop by price</h4>
                        </div>
                        <div class="filter-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="20" data-max="100"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <p>Price:</p>
                                    <form action="{{ route('priceLimitFoodie') }}" method="GET">
                                        <input type="text" id="minamount" name="minamount">
                                        <input type="text" id="maxamount" name="maxamount">
                                        <br>
                                        <button type="submit" class="mainButton mt-4"
                                            style="width: 100%;">Filter</button>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>



            <div class="col-lg-9 col-md-9">
                <div class="card-row ">
                    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">


                        @if ($foodie->isNotEmpty())


                            @foreach ($foodie as $item)
                                @if ($item->sale > 0 && $item->quantity > 0)
                                    <div class="product__item sale">
                                        <div class="product__item__pic set-bg scaling mr-3"
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
                                @elseif ($item->sale == 0 && $item->quantity > 0)
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg mr-3"
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
                                @elseif ($item->sale == 0 && $item->quantity == 0)
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg mr-3"
                                            data-setbg="{{ asset('storage/images/' . $item->product_img) }}">
                                            <div class="label stockout">Out Of Stock</div>

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
                                @elseif ($item->sale > 0 && $item->quantity == 0)
                                    <div class="product__item ">
                                        <div class="product__item__pic set-bg mr-3"
                                            data-setbg="{{ asset('storage/images/' . $item->product_img) }}">
                                            <div class="label stockout">Out Of Stock with Sale {{ $item->sale }}%
                                            </div>

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

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- </div>
    </div> -->
</section>
<!-- Shop Section End -->

{{ View::make('footer') }}

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
