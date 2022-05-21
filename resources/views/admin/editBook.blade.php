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
                    <a href="{{url('admin.booksAdmin')}}"><i class="fa fa-home"></i> Book Store</a>
                    <span>Edit Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('updateBook', $books->id) }}" method="post" enctype="multipart/form-data">
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
                    <option value="{{$books->genre}}" selected>{{$books->genre}}</option>
                    <option value="Novel">Novel</option>
                    <option value="Kids">Kids</option>
                    <option value="Educational">Educational</option>
                    <option value="History">History</option>

                </select>
            </div>
            <div>
                <label for=""> author </label>
                <select name="author" id="author" class="form-control">
                    <option value="{{$books->author}}" selected>{{$books->author}}</option>
                    <option value="Marian Keyes">Marian Keyes</option>
                    <option value="Kristin Hannah">Kristin Hannah</option>
                    <option value="Marian Keyes">Marian Keyes</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>
