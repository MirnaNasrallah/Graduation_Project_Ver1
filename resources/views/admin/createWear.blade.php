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
                    <a href="{{url('wearsAdmin')}}"><i class="fa fa-home"></i> Wears Store</a>
                    <span>Create Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('storeWear') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @csrf
            <div>
                <label for=""> Product name </label>
                <input type="text" class="form-control" name="name" required="required">
            </div>
            <div>
                <label for=""> description </label>
                <input type="text" class="form-control" name="description" required="required">
            </div>
            <div>
                <label for=""> price </label>
                <input type="text" class="form-control" name="price" required="required">
            </div>
            <div>
                <label for=""> Sale percentage </label>
                <input type="text" class="form-control" name="sale" required="required" placeholder="0 for no sale"   >
            </div>
            <br>
            <div>
                <input type="file" name="product_img" required="required">
            </div>
            <br>

            <div>
                <label for=""> event </label>
                {{-- <input type="text" class="form-control" name="event"> --}}
                <select name="event" id="event" class="form-control">
                    <option value="classy">classy</option>
                    <option value="casual">casual</option>
                    <option value="formal">formal</option>
                    <option value="party">party</option>
                </select>
            </div>
            <div>
                <label for=""> category </label>
                <select name="category" id="category" class="form-control">
                    <option value="coat">coat</option>
                    <option value="dress">dress</option>
                    <option value="jeans">jeans</option>
                    <option value="jacket">jacket</option>
                    <option value="shirt">shirt</option>
                    <option value="bag">bags</option>
                    <option value="shoes">shoes</option>
                    <option value="accessories">accessories</option>
                    <option value="T-shirt">T-shirt</option>
                </select>
            </div>
            <div>
                <label for=""> size </label>
                <select name="size" id="size" class="form-control">
                    <option value="xs">xs</option>
                    <option value="s">s</option>
                    <option value="m">m</option>
                    <option value="l">l</option>
                    <option value="xl">xl</option>
                    <option value="xxl">xxl</option>

                </select>
            </div>
            <div>
                <label for=""> color </label>
                <input type="text" class="form-control" name="color">
            </div>
            <div>
                <label for=""> gender </label>
                <select name="gender" id="gender" class="form-control">
                    <option value="women">women</option>
                    <option value="men">men</option>
                    <option value="kids">kids</option>

                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>
