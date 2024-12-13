<?php
    
    use Illuminate\Support\Facades\DB;

    $gadgets = DB::select('SELECT * FROM gadgets');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DigitalPhoto">
    <link rel="icon" type="image/x-icon" href="faviconDP.ico">
    {{-- <meta name="keywords" content="Male_Fashion, unica, creative, html"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DigitalPhoto</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <!-- Latest compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome_css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/elegant-icons.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/welcome_css/font-awesome.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('css/welcome_css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/slicknav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__nav__option">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/about') }}" class="">
                        Chi Siamo
                    </a>
                @else
                    <a href="{{ route('login') }}" class="">
                        Login
                    </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="">
                    Register
                    </a>
                @endif
                @endauth
            @endif
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        {{-- <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#">Sign in</a>
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container__header">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/welcome_img/DPLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li> <a href="\"> Home </a> </li>
                            <li> <a href="albums"> Album </a> </li>
                            <li> <a href="gadgets"> Accessori </a> </li>
                            <li> <a href="courses"> Corsi </a> </li>
                            <li class="active"> <a href="about"> Chi Siamo </a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <nav class="header__menu mobile-menu">
                        @if (Route::has('login'))
                            @auth
                                <a class="icon__header" href="likes"> <i class="fa-solid fa-heart fa-lg"></i> </a>
                                <a class="icon__header" href="bag"> <i class="fa-solid fa-bag-shopping fa-lg"></i> </a>
                                <div class="dropdown__user icon__header">
                                    <a> <i class="fa-solid fa-user fa-lg"></i> </a>
                                    <div id="dropdownUser" class="dropdown__user__links">
                                        <a href="{{ route('profile.edit') }}">Profilo</a>
                                        {{-- <a href="#contact">Notifiche</a> --}}
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href=" {{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </form>
                                    </div>
                                </div>
                                {{-- <a href="likes"><img src="img/welcome_img/icon/heart.png" alt=""></a> --}}
                                {{-- <a href="bag"><img src="img/welcome_img/icon/cart.png" alt=""> <span>0</span></a> --}}
                                {{-- fare query_php --}}
                            @else
                                <a href="{{ route('login') }}" class="primary-btn-LoginRegister">
                                    Login
                                </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="primary-btn-LoginRegister">
                                    Register
                                </a>
                            @endif
                            @endauth
                        @endif
                    </nav>
                    {{-- <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/welcome_img/icon/search.png" alt=""></a>
                        <a href="#"><img src="img/welcome_img/icon/heart.png" alt=""></a>
                        <a href="#"><img src="img/welcome_img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                    </div> --}}
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Chi Siamo</h4>
                        <div class="breadcrumb__links">
                            <a href="\">Home</a>
                            <span>Chi Siamo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Chi Siamo?</h2>
                            <p class="p-justify">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Cosa Facciamo?</h4>
                                <p class="p-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </li>
                            <li>
                                <h4>Cosa Offriamo?</h4>
                                <p class="p-justify">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 about-img">
                    <img src="img/welcome_img/about.png" alt="">
                </div>
                   {{--  <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <div class="section-title">
        <h2>Dove Trovarci?</h2>
    </div>

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25000!2d12.2430!3d44.1399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0!2sCesena!5e0!3m2!1sit!2sit!4vTIMESTAMP!5m2!1sit!2sit" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
    </div>
    <!-- Map End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/welcome_img/DPLogo_noback_white.png" alt=""></a>
                        </div>
                        <p> DigitalPhoto offre album fotografici di alta qualità, corsi di fotografia professionali e accessori per ogni 
                            esigenza fotografica. Siamo il partner ideale per immortalare i tuoi momenti speciali e migliorare le tue abilità 
                            fotografiche. </p>
                        <a href="#"><img src="img/welcome_img/payment.png" alt=""></a>
                    </div>
                </div>
                {{-- <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewsLetter</h6>
                        <div class="footer__newslatter">
                            <p>Iscriviti alla nostra Newsletter per offerte esclusive, consigli fotografici e le ultime novità di DigitalPhoto!</p>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        {{-- <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p> --}}
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    {{-- <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div> --}}
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/welcome_js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/welcome_js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/welcome_js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('js/welcome_js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/welcome_js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/welcome_js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('js/welcome_js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/welcome_js/mixitup.js') }}"></script>
    <script src="{{ asset('js/welcome_js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/welcome_js/main.js') }}"></script>
</body>

</html>