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
                    <a href="{{url('admin.techAdmin')}}"><i class="fa fa-home"></i> Tech Store</a>
                    <span>Edit Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('updateTech', $tech->id) }}" method="post" enctype="multipart/form-data">
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
            <div>
                <label for=""> Sale percentage </label>
                <input type="text" class="form-control" name="sale" maxlength="2" >
            </div>
            <br>
            <div>
                <input type="file" name="product_img">
            </div>
            <br>

            <div>
                <label for=""> category </label>
                <select name="category" id="category" class="form-control">
                    <option value="{{$tech->category}}" selected>{{$tech->category}}</option>
                    <option value="Mobiles">Mobiles</option>
                    <option value="LapTops">LapTops</option>
                    <option value="Tablets">Tablets</option>
                    <option value="Chargers">Chargers</option>
                    <option value="Accessories">Accessories</option>

                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>
