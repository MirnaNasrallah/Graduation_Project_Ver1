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
                    <span>Create Product</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-row ">
    <div class=" row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
        <form action="{{ route('storeBook') }}" method="post" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="sale"required="required" placeholder="0 for no sale"  >
            </div>
            <br>
            <div>
                <input type="file" name="product_img" required="required">
            </div>
            <br>

            <div>
                <label for=""> genre </label>
                <select name="genre" id="genre" class="form-control">
                    <option value="Novel">Novel</option>
                    <option value="Kids">Kids</option>
                    <option value="Educational">Educational</option>
                    <option value="History">History</option>

                </select>
            </div>
            <div>
                <label for=""> author </label>
                <select name="author" id="author" class="form-control">
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
