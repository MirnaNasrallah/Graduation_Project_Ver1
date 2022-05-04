@extends('layouts.app')
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu End -->
{{ View::make('header') }}
{{-- <div class="card-row row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1"> --}}
<div class="col-lg-9 col-md-9">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="product__item">
                @foreach ($wears as $item)
                    <div class="product__item__pic set-bg" data-setbg="{{ $item->product_img }}">
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
            </div>

        </div>

    </div>

</div>
@endforeach
{{-- </div> --}}
{{-- </div> --}}
{{ View::make('footer') }}

