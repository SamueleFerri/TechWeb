<?php
    
    use Illuminate\Support\Facades\DB;

    $gadgets = DB::select('SELECT * FROM gadgets');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DigitalPhoto</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/welcome_css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/slicknav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/welcome_css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__nav__option">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/bag') }}" class="">
                        Carrello
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
        {{-- <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div> --}}
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
                        <a href="\"><img src="img/welcome_img/DPLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li> <a href="\"> Home </a> </li>
                            <li> <a href="albums"> Album </a> </li>
                            <li class="active"> <a href="gadgets"> Accessori </a> </li>
                            <li> <a href="courses"> Corsi </a> </li>
                            <li> <a href="about"> Chi Siamo </a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        {{-- <a href="#" class="search-switch"><img src="img/welcome_img/icon/search.png" alt=""></a> --}}
                        <a href="likes"><img src="img/welcome_img/icon/heart.png" alt=""></a>
                        <a href="bag"><img src="img/welcome_img/icon/cart.png" alt=""> <span>0</span></a>
                        <div class="price">$0.00</div>
                        {{-- fare query_php --}}
                    </div>
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
                        <h4>Accessori</h4>
                        <div class="breadcrumb__links">
                            <a href="\">Home</a>
                            <span>Accessori</span>
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
                                                    {{-- <li><a href="#">Women (20)</a></li>
                                                    <li><a href="#">Bags (20)</a></li>
                                                    <li><a href="#">Clothing (20)</a></li>
                                                    <li><a href="#">Shoes (20)</a></li>
                                                    <li><a href="#">Accessories (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li> --}}
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
                            foreach ($gadgets as $row){
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/welcome_img/product/copertina_album<?php echo $row->id; ?>.png">
                                    <span class="label">New</span>
                                </div>
                                <div class="product__item__text">
                                    {{-- <h5><?php #echo $row->titolo ?></h5> da aggiungere al DB --}}
                                    <h6><?php echo $row->descrizione?></h6>
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
                                <a class="active" href="gadgets">1</a>
                                <a href="gadgets">2</a>
                                <a href="gadgets">3</a>
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