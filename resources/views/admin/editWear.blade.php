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
                    <a href="{{ url('admin.wearsAdmin') }}"><i class="fa fa-home"></i> Wears</a>
                    <span>Edit product</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9 col-md-9">
    <div class="card-row ">
        <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
            <form action="{{ route('updateWear', $wears->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                @method('put')
                <div>
                    <label for=""> Product name </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
                    <label for=""> description </label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div>
                    <label for=""> price </label>
                    <input type="text" class="form-control" name="price">
                </div>
                <br>
                <div>
                    <input type="file" name="product_img">
                </div>
                <br>

                <div>
                    <label for=""> event </label>
                    <input type="text" class="form-control" name="event">
                </div>
                <div>
                    <label for=""> category </label>
                    <input type="text" class="form-control" name="category">
                </div>
                <div>
                    <label for=""> size </label>
                    <input type="text" class="form-control" name="size">
                </div>
                <div>
                    <label for=""> color </label>
                    <input type="text" class="form-control" name="color">
                </div>
                <div>
                    <label for=""> gender </label>
                    <input type="text" class="form-control" name="gender">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{ View::make('footer') }}
