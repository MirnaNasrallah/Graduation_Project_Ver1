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
                <a href="{{url('admin.booksAdmin')}}"><i class="fa fa-home"></i> Book Store</a>
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
                    <h4 class="text-danger"><strong>Add a Book Product</strong></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeBook') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Product name </label>
                                <input type="text" class="form-control" name="name" required="required" placeholder="Enter Your Product Name">
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Product Description </label>
                                <input type="text" class="form-control" name="description" required="required" placeholder="Enter Your Product Description">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Price </label>
                                <input type="text" class="form-control" name="price" required="required" placeholder="Product Price">
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Sale percentage <span class="font-weight-normal text-danger">( 0 for no sale )</span> </label>
                                <input type="text" class="form-control" name="sale" required="required" placeholder="Enter your Sale Percentage">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Genre </label>
                                <select name="genre" id="genre" class="form-control">
                                    <option value="Novel">Novel</option>
                                    <option value="Kids">Kids</option>
                                    <option value="Educational">Educational</option>
                                    <option value="History">History</option>

                                </select>
                            </div>
                            <div class="mx-auto my-2 col-lg-5 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold ml-1"> Author </label>
                                <select name="author" id="author" class="form-control">
                                    <option value="Marian Keyes">Marian Keyes</option>
                                    <option value="Kristin Hannah">Kristin Hannah</option>
                                    <option value="Paulo Coelho">Paulo Coelho</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-5 mx-auto my-2 shadow py-3 rounded-lg mainColor">
                                <label class="font-weight-bold"> Add image </label>
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
