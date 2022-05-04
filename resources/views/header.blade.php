<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ url('/') }}"><img src="img/Capture1.PNG" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">

                    <ul>
                        @guest
                            <li><a href="{{ url('wears') }}">Wears</a></li>
                            <li><a href="{{ url('books') }}">Books</a></li>
                            <li><a href="{{ url('drugs') }}">Drug store</a></li>
                            <li><a href="{{ url('tech') }}">Tech</a></li>
                            <li><a href="{{ url('foodie') }}">Foodie</a></li>
                        @else
                            @if (Auth::user()->level_id == '0')
                                <li><a href="{{ url('admin.wearsAdmin') }}">Wears</a></li>
                                <li><a href="{{ url('books') }}">Books</a></li>
                                <li><a href="{{ url('drugs') }}">Drug store</a></li>
                                <li><a href="{{ url('tech') }}">Tech</a></li>
                                <li><a href="{{ url('foodie') }}">Foodie</a></li>
                               
                                @else
                                <li><a href="{{ url('wears') }}">Wears</a></li>
                                <li><a href="{{ url('books') }}">Books</a></li>
                                <li><a href="{{ url('drugs') }}">Drug store</a></li>
                                <li><a href="{{ url('tech') }}">Tech</a></li>
                                <li><a href="{{ url('foodie') }}">Foodie</a></li>
                                <li><a href="#">Your space !</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('userProfile') }}">Profile</a></li>
                                        <li><a href="{{ route('cart') }}">Your Cart</a></li>
                                        <li><a href="{{ route('wishlist') }}">Your wishlist</a></li>
                                        <li><a href="./blog-details.html">Checkout</a></li>
                                    </ul>
                                </li>

                            @endif
                        @endguest

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @auth
                            <a href="{{ route('home') }}">home</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                    <ul class="header__right__widget">
                        <li><a href="{{ route('search') }}"><span class="icon_search search-switch"></span></li>
                        <li><a href="{{ route('wishlist') }}"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        <li><a href="{{ route('cart') }}"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
