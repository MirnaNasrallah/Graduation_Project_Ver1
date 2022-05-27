@extends('layouts.app')

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu End -->
{{ View::make('header') }}

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option ml-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb__links">
                <a href="{{url('wearsAdmin')}}"><i class="fa fa-home"></i> Wears Store</a>
                <span>Create Product</span>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h4 class="text-danger"><strong>Add a Wear Product</strong></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeWear') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="productName" class="font-weight-bold ml-1"> Product Name </label>
                                <input id="productName" class="form-control" type="text" placeholder="Enter Your Product Name" name="name" required="required">
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> Product Description </label>
                                <input type="text" class="form-control" name="description" placeholder="Enter Your Product Description" required="required">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> price </label>
                                <input type="text" class="form-control" name="price" placeholder="Product Price" required="required">
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> Sale percentage <span class="font-weight-normal text-danger">( 0 for no sale )</span> </label>
                                <input type="text" class="form-control" name="sale" placeholder="Enter your Sale Percentage" required="required">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> Event </label>
                                {{-- <input type="text" class="form-control" name="event"> --}}
                                <select name="event" id="event" class="form-control">
                                    <option value="classy">classy</option>
                                    <option value="casual">casual</option>
                                    <option value="formal">formal</option>
                                    <option value="party">party</option>
                                </select>
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> Category </label>
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
                        </div>

                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label for="" class="font-weight-bold ml-1"> Size </label>
                                <select name="size" id="size" class="form-control">
                                    <option value="xs">xs</option>
                                    <option value="s">s</option>
                                    <option value="m">m</option>
                                    <option value="l">l</option>
                                    <option value="xl">xl</option>
                                    <option value="xxl">xxl</option>

                                </select>
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Color </label>
                                <input type="text" class="form-control" name="color" placeholder="Enter Your Product Color">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 mx-auto my-2 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold"> Gender </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="women">women</option>
                                    <option value="men">men</option>
                                    <option value="kids">kids</option>

                                </select>
                            </div>

                            <div class="col-lg-5 mx-auto my-2 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Add image </label>
                                <input type="file" id="customFile" class="custom-file-input" name="product_img" required="required">
                                <label class="custom-file-label ml-3 mt-5" for="customFile" style="width: 75%;">Choose file</label>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="site-btn m-auto" style="width: 50%;">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<script>
    // To make the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
