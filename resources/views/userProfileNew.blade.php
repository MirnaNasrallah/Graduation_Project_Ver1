@extends('layouts.app')
{{ View::make('header') }}
<!-- User-Profile Begin -->
<div class="container light-style flex-grow-1 container-p-y">
    <!-- Profile Header Begin -->
    <h4 class="font-weight-bold py-3 mb-4 account-sett">
        User Profile
    </h4>
    <!-- Profile Header End -->

    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <!-- List Begin -->
            <div class="col-md-3">
                <div class="list-group list-group-flush" role="tablist">
                    <button class="list-group-item list-group-item-action active" id="account-general-list"
                        href="#account-general" data-toggle="list" role="tab"
                        aria-controls="account-general">General</button>
                    <button class="list-group-item list-group-item-action" id="account-security-list"
                        href="#account-security" data-toggle="list" role="tab"
                        aria-controls="account-change-password">Security</button>
                    <button class="list-group-item list-group-item-action" id="account-settings-list"
                        href="#account-settings-security" data-toggle="list" role="tab" aria-controls="">Account
                        Settings</button>
                    <button class="list-group-item list-group-item-action" id="" href="#" data-toggle="list" role="tab"
                        aria-controls="">History</button>
                </div>
            </div>
            <!-- List End -->

            <div class="col-md-9">
                <div class="tab-content">
                    <!-- General Begin -->
                    <div class="tab-pane fade active show" id="account-general" role="tabpanel"
                        aria-labelledby="account-general-list">


                        <div class="card-body">

                            <div class="col-xl-3 col-lg-2">
                                <div class="header__logo">
                                    {{-- <a href="{{ url('/') }}"><img src="img/logo.png" alt=""></a> --}}
                                    @if (Auth::user()->image)
                                        <img class="image rounded-circle"
                                            src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                                            alt="profile_image"
                                            style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                    @endif


                                    <form action="{{ route('imageupload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="image">
                                        <input type="submit" value="Upload">
                                    </form>


                                </div>
                            </div>
                            <form action="{{ route('user.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label"><strong>Full Name</strong></label>
                                    <input type="text" name="name" class="form-control mb-1" value="{{ $users->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><strong>E-mail</strong></label>
                                    <input type="text" name="email" class="form-control mb-1" value=" {{ $users->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><strong>Mobile Number</strong></label>
                                    <input type="text" name="phone" class="form-control mb-1" value=" {{ $users->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><strong>Job</strong></label>
                                    <input type="text" name="job" class="form-control mb-1" value=" {{ $users->job }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control mb-1" value=" {{ $users->address }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><strong>Interests</strong></label>
                                    <input type="text" name="interests" class="form-control mb-1"
                                        placeholder="Tell something about yourself">
                                </div>

                                <!-- Save Begin -->

                                <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Save changes</button>

                                <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-right mt-3">
                            <form action="{{route('userProfileNew')}}">

                            </form>
                        </div>
                        <!-- Save Begin -->
                    </div>
                    <!-- General End -->

                    <!-- Change Password Begin -->
                    <div class="tab-pane fade" id="account-security" role="tabpanel"
                        aria-labelledby="account-security-list">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label"><strong>Current password</strong></label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><strong>New password</strong></label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label"><strong>Repeat new password</strong></label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>

                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                    </div>
                    <!-- Change Password End -->

                    <!-- Account Settings Begin -->
                    <div class="tab-pane fade" id="account-settings-security" role="tabpanel"
                        aria-labelledby="account-settings-list">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label"><strong>Username</strong></label>
                                <input type="text" class="form-control" value="3bso99">
                            </div>
                            <div class="form-group">
                                <label class="d-block text-danger">Delete Account</label>
                                <p class="text-muted font-size-sm">Once you delete your account, there is no going
                                    back.Please be certain.</p>
                                <button class="btn btn-danger" type="button">Delete Account</button>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>

                            <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- User-Profile End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    {{ View::make('footer') }}
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    </body>

    </html>
