@extends('layouts.app')
 {{ View::make('header') }}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <header class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2">
                            <div class="header__logo">
                                {{-- <a href="{{ url('/') }}"><img src="img/logo.png" alt=""></a> --}}
                                @if (Auth::user()->image)
                                    <img class="image rounded-circle"
                                        src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                                        alt="profile_image"
                                        style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                                @endif


                                <form action="{{ route('imageupload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image">
                                    <input type="submit" value="Upload">
                                </form>


                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <nav class="header__menu">
                                <ul>
                                    <li> {{ $users->name }}
                                        <div class="col-md-8 offset-md-4">
                                            <form action="{{ route('edit') }}" method="GET">

                                                @csrf

                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Edit') }}
                                                </button>

                                            </form>
                                            {{-- <button type="submit" class="btn btn-primary">
                                                {{ __('Edit') }}
                                            </button> --}}
                                            {{-- <form action="{{ route('user.update') }}" method="POST">

                                                @csrf
                                                <input type="text" class="form-control input" name="name"
                                                    placeholder="name">

                                                <input type="text" class="form-control input" name="email"
                                                    placeholder="email">



                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Edit') }}
                                                </button>


                                            </form> --}}
                                        </div>
                                        {{-- <ul class="dropdown">
                                            <li><a href="./product-details.html">Product Details</a></li>
                                        </ul> --}}
                                    </li>
                                </ul>

                            </nav>

                        </div>

                    </div>

                </div>

            </header>

            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}




                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{-- @foreach ($users as $user) --}}
                    {{-- <p>Name: {{ $users->name }}</p> --}}
                    <p>email: {{ $users->email }}</p>
                    {{-- @endforeach --}}

                </div>
                {{-- @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </table> --}}


            </div>
        </div>
    </div>
</div>
