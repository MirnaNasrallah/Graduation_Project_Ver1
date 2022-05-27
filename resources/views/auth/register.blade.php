@extends('layouts.app')
{{ View::make('header') }}

<div class="container mt-4" style="padding: 0;">
    <div class="row text-center">
        <div class="col-md-12 m-auto">
            <div class="card card-block d-flex">

                <div class="card-header font-weight-bold text-center">
                    <h3><strong>{{ __('Register') }}</strong></h3>
                </div>

                <div class="row">
                    <div class="card-body col-8 align-items-center d-flex justify-content-center">
                        <form style="width: 550px;" method="POST" action="{{ route('register') }}" onsubmit="return matchPassword()" name="registerForm">
                            @csrf

                            <div class="progress" style="margin-left: 200px;">
                                <div class="progress-bar bg-danger" role="progressbar" id="prog" style="width: 0px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="row mb-4 mt-3">
                                <label for="name" class="col-lg-4 col-form-label text-md-end font-weight-bold text-center">{{ __('Name') }}</label>

                                <div class="col-lg-8 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="userName">
                                            <span class="material-icons">
                                                alternate_email
                                            </span>
                                        </div>
                                    </div>
                                    <input aria-describedby="userName" id="name" type="text" oninput="progressBar()" placeholder="Enter your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="gender" class="col-lg-4 col-form-label text-md-end font-weight-bold text-center"> Gender </label>
                                <div class="col-lg-8">
                                    <select name="gender" id="gender" class="form-control" oninput="progressBar()">
                                        <option value="none" selected disabled hidden>Select an Option</option>
                                        <option value="female">female</option>
                                        <option value="male">male</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="email" class="col-lg-4 col-form-label text-md-end font-weight-bold text-center">{{ __('Email Address') }}</label>

                                <div class="col-lg-8 input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="forEmail">
                                            <span class="material-icons">
                                                email
                                            </span>
                                        </div>
                                    </div>
                                    <input aria-describedby="forEmail" id="email" type="email" oninput="progressBar()" placeholder="Enter your Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-lg-4 col-form-label text-md-end font-weight-bold text-center">{{ __('Password') }}</label>
                                <!-- add classname -->
                                <div class="col-lg-8 input-group">
                                    <input aria-describedby="btnGroupAddon" id="password" type="password" oninput="progressBar()" placeholder="Enter your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <!-- edit : add div -->
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="btnGroupAddon">
                                            <label for="forus" style="cursor: pointer; margin-bottom: 0;">
                                                <span id="icon_visibility1" class="material-icons" onclick="myFunction()">
                                                    visibility_off
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="button" style="display: none;" id="forus">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-lg-4 col-form-label text-md-end font-weight-bold text-center">{{ __('Confirm Password') }}</label>

                                <div class="col-lg-8 input-group">
                                    <input aria-describedby="Addon" id="password-confirm" type="password" oninput="progressBar()" placeholder="Confirm Your Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <!-- edit : add div -->
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="Addon">
                                            <label for="forus2" style="cursor: pointer; margin-bottom: 0;">
                                                <span id="icon_visibility2" class="material-icons" onclick="myFunction2()">
                                                    visibility_off
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="button" style="display: none;" id="forus2">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <button type="submit" class="mainButton form-control" style="padding: 0;">
                                        {{ __('Register') }}
                                    </button>
                                    <p class="mt-3">Have an Account?
                                        <a href="{{ __('login') }}">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <img src="img/coverr.jpeg" class="col-4" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function matchPassword() {
        var x = document.forms['registerForm']['password'].value;
        var y = document.forms['registerForm']['password_confirmation'].value;
        if (x != y) {
            alert("Passwords did not match");
            return false;
        } else
            return true;

    }

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById('icon_visibility1').innerHTML = 'visibility';
        } else {
            x.type = "password";
            document.getElementById('icon_visibility1').innerHTML = 'visibility_off';
        }
    }

    function myFunction2() {
        var y = document.getElementById("password-confirm");
        if (y.type === "password") {
            y.type = "text";
            document.getElementById('icon_visibility2').innerHTML = 'visibility';
        } else {
            y.type = "password";
            document.getElementById('icon_visibility2').innerHTML = 'visibility_off';
        }
    }

    function progressBar() {
        var a = document.getElementById("name").value;
        var b = document.getElementById("email").value;
        var c = document.getElementById("password").value;
        var d = document.getElementById("password-confirm").value;

        var ddl = document.getElementById("gender");
        var selectedValue = ddl.options[ddl.selectedIndex].value;

        var count = 0;

        if (a != "") {
            count++;
        }
        if (b != "") {
            count++;
        }
        if (c != "") {
            count++;
        }
        if (d != "") {
            count++;
        }
        if (selectedValue == "female" || selectedValue == "male") {
            count++;
        }

        if (count == 0) {
            document.getElementById("prog").style.width = "0";
        } else if (count == 1) {
            document.getElementById("prog").style.width = "20%";
        } else if (count == 2) {
            document.getElementById("prog").style.width = "40%";
        } else if (count == 3) {
            document.getElementById("prog").style.width = "60%";
        } else if (count == 4) {
            document.getElementById("prog").style.width = "80%";
        } else if (count == 5) {
            document.getElementById("prog").style.width = "100%";
        }

    }
</script>
