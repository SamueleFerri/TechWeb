<?php
    
    use Illuminate\Support\Facades\DB;

    $courses = DB::select('SELECT * FROM corsi');
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

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <nav class="mobile__menu">
            <ul>
                <li> <a href="\"> Home </a> </li>
                <li> <a href="albums"> Album </a> </li>
                <li> <a href="gadgets"> Accessori </a> </li>
                <li class="active"> <a href="courses"> Corsi </a> </li>
                <li> <a href="about"> Chi Siamo </a> </li>
            </ul>
        </nav>
        <div class="offcanvas__nav__option">
            <div class="offcanvas_btn-LoginRegister">
                @if (Route::has('login'))
                @auth
                    <a class="icon__header" href="likes"> <i class="fa-solid fa-heart fa-lg"></i> </a>
                    <a class="icon__header" href="bag"> <i class="fa-solid fa-bag-shopping fa-lg"></i> </a>
                    <div class="dropdown__user icon__header">
                        <a> <i class="fa-solid fa-user fa-lg"></i> </a>
                        <div class="dropdown__user__links">
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
            </div>
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
                            <li class="active"> <a href="courses"> Corsi </a> </li>
                            <li> <a href="about"> Chi Siamo </a> </li>
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
                                    <div class="dropdown__user__links">
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
                        <h4>Corsi</h4>
                        <div class="breadcrumb__links">
                            <a href="\">Home</a>
                            <span>Corsi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                {{-- fare query_php --}}
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="#">Men (20)</a></li>
                                                    {{-- add query_php --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                    {{-- add query_php --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    {{-- <p>Showing 1–12 of 126 results</p> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">High To Low</option>
                                        {{-- add query_php --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            foreach ($courses as $row){
                        ?>
                        <div class="col__dipslay__card col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals col__items__card">
                            <div class="card card__item">
                                <div class="product__item__pic set-bg" data-setbg="img/welcome_img/product/copertina_album<?php echo $row->id ?>.png">
                                    <span class="label">New</span>
                                    <span class="prezzo"><?php echo $row->prezzo ?>$</span>
                                </div>
                                <div class="product__item__text">
                                    <h5><?php echo $row->nome ?></h5>
                                    <h6><?php echo $row->descrizione ?></h6>
                                </div>
                                <div class="row row__icon">
                                    <div class="col-6">
                                        <a href="likes"> <i class="fa-solid fa-heart fa-xl" style="color:#bd6e6d; padding-top: 20px; padding-bottom: 15px;"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <a href="bag"> <i class="fa-solid fa-bag-shopping fa-xl" style="color:#000000; padding-top: 20px; padding-bottom: 15px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="courses">1</a>
                                <a href="courses">2</a>
                                <a href="courses">3</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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