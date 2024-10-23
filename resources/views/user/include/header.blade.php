@guest('user')
    <header class="header-section bg-light">
        <div class="srcn-container">
            <div class="menu_icon-img row-header">
                <nav class="navbar navbar-expand-lg navbar-light menu_list-in"
                    style="background-color: transparent; box-shadow: none;}">
                    <div class=" d-row d-row_container g-conter-items">
                        <a href="{{ route('/') }}" class="navbar-brand d-flex  h-conter gap-w">
                            <span class="fa fa-bars" aria-hidden="true"></span>

                            <!-- Menu Bar Hover start -->

                            <!-- Menu Bar Hover End -->

                            <img src="{{ asset('/user/assets/images/logo/logo1.jpeg') }}" clasa="header-img-logo-top" />
                        </a>
                        <!-- Mobile Section Start -->
                        <div class="seacrch-box">
                            <ul class="navbar-nav mb-2 mb-lg-0 d-flex menu-bar-in flex-wra -gcol-row g-conter-items">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#"
                                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                        Account
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-in" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item btn-sing btn-sing-in"
                                                href="{{ route('user/login') }}">Sing In</a></li>
                                        <hr class="dropdown-divider">
                                        <li><a class=" dropdown-item btn-sing " href=" {{ route('user/register') }}">Create
                                                account</a>
                                        </li>
                                        <li><a class="dropdown-item btn-sing " href="#">Saved Items
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-row h-conter gap-w" aria-current="page"
                                        href="{{ route('cart') }}">
                                        @if (session('cart'))
                                            <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                            <span class="cart-box-top">{{ $cartItem }}</span>
                                        @else
                                            <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                            <span class="cart-box-top">0</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Mobile Section End -->
                        <div class="seacrch-box new-searchBar">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search"
                                    placeholder="Search products, brands and categories" aria-label=" Search">
                                <button class="btn btn-outline-in" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search"
                                placeholder="Search products, brands and categories" aria-label=" Search">
                            <button class="btn btn-warning " type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-user" aria-hidden="true"></span>
                                    Account
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item btn-sing
                           btn-sing-in"
                                            href="{{ route('user/login') }}">Sing In</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item btn-sing " href="{{ route('user/register') }}">Create
                                            account</a>
                                    </li>
                                    <li>
                                    </li>
                                    <li><a class="dropdown-item btn-sing " href="#">Saved Items
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-question" aria-hidden="true"></span>
                                    Help
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item btn-sing  btn-sing-in gap-w" href="#">Action</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item btn-sing " href="#">Another action</a></li>
                                    <li>
                                    </li>
                                    <li><a class="dropdown-item btn-sing " href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  d-row h-conter gap-w" aria-current="page"
                                    href="{{ route('cart') }}">
                                    @if (session('cart'))
                                        <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                        <span class="cart-box-top">{{ $cartItem }}</span>
                                    @else
                                        <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                        <span class="cart-box-top">0</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@else
    <header class="header-section bg-light">
        <div class="srcn-container">
            <div class="menu_icon-img row-header">
                <nav class="navbar navbar-expand-lg navbar-light menu_list-in"
                    style="background-color: transparent; box-shadow: none;
            }">
                    <div class=" d-row d-row_container g-conter-items">
                        <a href="{{ route('/') }}" class="navbar-brand d-flex  h-conter gap-w">
                            <span class="fa fa-bars" aria-hidden="true"></span>
                            <img src="{{ asset('/user/assets/images/logo/logo1.jpeg') }}" clasa="header-img-logo-top" />
                        </a>
                        <!-- Mobile Section Start -->
                        <div class="seacrch-box">
                            <ul class="navbar-nav mb-2 mb-lg-0 d-flex menu-bar-in flex-wra -gcol-row g-conter-items">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#"
                                        id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                        {{ Auth::guard('user')->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-in" aria-labelledby="navbarDropdown">
                                        <hr class="dropdown-divider">
                                        <li><a class="dropdown-item btn-sing " href="#">Saved Items</a></li>
                                        <hr class="dropdown-divider">
                                        <li>
                                            <a class="dropdown-item btn-sing " href="{{ route('user/account') }}">
                                                <ion-icon name="person"></ion-icon>
                                                My account
                                            </a>
                                        </li>
                                        <hr class="dropdown-divider">
                                        <li>
                                            <a class="dropdown-item btn-sing " href="{{ route('user/logout') }}">
                                                <ion-icon name="person"></ion-icon>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  d-row h-conter gap-w" aria-current="page"
                                        href="{{ route('cart') }}">
                                        @if (session('cart'))
                                            <img src="{{ asset('/user/assets/images/cart.png') }}"
                                                class="cart-icon-img" />
                                            <span class="cart-box-top">{{ $cartItem }}</span>
                                        @else
                                            <img src="{{ asset('/user/assets/images/cart.png') }}"
                                                class="cart-icon-img" />
                                            <span class="cart-box-top">0</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Mobile Section Start -->
                        <div class="seacrch-box">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search"
                                    placeholder="Search products, brands and categories" aria-label=" Search">
                                <button class="btn btn-outline-in" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search"
                                placeholder="Search products, brands and categories" aria-label=" Search">
                            <button class="btn btn-warning " type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-user" aria-hidden="true"></span>
                                    {{ Auth::guard('user')->user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item btn-sing " href="#">Saved Items</a></li>
                                    <hr class="dropdown-divider">
                                    <li>
                                        <a class="dropdown-item btn-sing " href="{{ route('user/account') }}">
                                            <ion-icon name="person"></ion-icon>
                                            My account
                                        </a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li>
                                        <a class="dropdown-item btn-sing " href="{{ route('user/logout') }}">
                                            <ion-icon name="person"></ion-icon>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-row h-conter gap-w" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-question" aria-hidden="true"></span>
                                    Help
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item btn-sing  btn-sing-in gap-w" href="#">Action</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item btn-sing " href="#">Another action</a></li>
                                    <li>
                                    </li>
                                    <li><a class="dropdown-item btn-sing " href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  d-row h-conter gap-w" aria-current="page"
                                    href="{{ route('cart') }}">
                                    @if (session('cart'))
                                        <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                        <span class="cart-box-top">{{ $cartItem }}</span>
                                    @else
                                        <img src="{{ asset('/user/assets/images/cart.png') }}" class="cart-icon-img" />
                                        <span class="cart-box-top">0</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@endguest
