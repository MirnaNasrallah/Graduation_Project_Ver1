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
                    <a href="{{url('admin.foodAdmin')}}"><i class="fa fa-home"></i> Foodie Store</a>
                    <span>Edit Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('updateFood', $food->id) }}" method="post" enctype="multipart/form-data">
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
                <label for=""> Category </label>
                <select name="category" id="category" class="form-control">
                    <option value="{{$food->category}}" selected>{{$food->category}}</option>
                    <option value="Snacks">Snacks</option>
                    <option value="desserts">desserts</option>
                    <option value="veggies">veggies</option>
                    <option value="fruits">fruits</option>
                    <option value="dressings">dressings</option>

                </select>
            </div>
            <div>
                <label for=""> Calories </label>
                <select name="calories" id="calories" class="form-control">
                    <option value="{{$food->calories}}" selected>{{$food->calories}}</option>
                    <option value="low">low</option>
                    <option value="mid">mid</option>
                    <option value="high">high</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>
