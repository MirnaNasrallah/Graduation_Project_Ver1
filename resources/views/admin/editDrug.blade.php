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
                    <a href="{{url('admin.drugAdmin')}}"><i class="fa fa-home"></i> Drug Store</a>
                    <span>Edit Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('updateDrug', $drugs->id) }}" method="post" enctype="multipart/form-data">
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
                <label for=""> genre </label>
                <select name="genre" id="genre" class="form-control">
                    <option value="{{$drugs->genre}}" selected>{{$drugs->genre}}</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Hair Care">Hair Care</option>
                    <option value="Skin Care">Skin Care</option>
                    <option value="Devices">Devices</option>
                    <option value="Sanitizers">Sanitizers</option>

                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>
