<?php
    use Illuminate\Support\Facades\DB;

    $cont = 0;
    $albums = DB::select('SELECT * FROM albums');
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="DigitalPhoto">
    <link rel="icon" type="image/x-icon" href="faviconDP.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DigitalPhoto</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Menu Mobile Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <nav class="mobile__menu">
            <ul>
                <li class="active"> <a href="\"> Home </a> </li>
                <li> <a href="albums"> Album </a> </li>
                <li> <a href="gadgets"> Accessori </a> </li>
                <li> <a href="courses"> Corsi </a> </li>
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
                        Registrati
                    </a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
    <!-- Menu Mobile End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container__header">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="img/DPLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"> <a href="\"> Home </a> </li>
                            <li> <a href="albums"> Album </a> </li>
                            <li> <a href="gadgets"> Accessori </a> </li>
                            <li> <a href="courses"> Corsi </a> </li>
                            <li> <a href="about"> Chi Siamo </a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <nav class="header__menu">
                        @if (Route::has('login'))
                            @auth
                                <a class="icon__header" href="likes"> <i class="fa-solid fa-heart fa-lg"></i> </a>
                                <a class="icon__header" href="bag"> <i class="fa-solid fa-bag-shopping fa-lg"></i> </a>
                                <div class="dropdown__user icon__header">
                                    <a> <i class="fa-solid fa-user fa-lg"></i> </a>
                                    <div class="dropdown__user__links">
                                        <a href="{{ route('profile.edit') }}">Profilo</a>
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
                                    Registrati
                                </a>
                            @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="img/Carousel2.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>DigitalPhoto Collection</h6>
                                <h2>Benvenuti su DigitalPhoto-Shop</h2>
                                <a href="{{ route('login') }}" class="primary-btn">FAI LOGIN PER L'ACQUISTO  <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="img/Carousel1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>DigitalPhoto Collection</h6>
                                <h2>Impara subito a scattare foto come queste...</h2>
                                <a href="{{ route('login') }}" class="primary-btn">FAI LOGIN PER L'ACQUISTO  <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="subsection">Articoli più venduti</p>
                </div>
            </div>
            <div class="row product__filter">
                <?php
                    foreach ($albums as $row){
                        $cont++;
                ?>
                <div class="col__dipslay__card__home mix new-arrivals col__items__card">
                    <div class="card card__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/copertina_album<?php echo $row->id ?>.png">
                            <span class="label">
                                <?php 
                                echo ($cont <= 3) ? 'nuovo' : ''; 
                                ?>
                            </span>
                            <span class="prezzo"><?php echo $row->prezzo ?>$</span>
                        </div>
                        <div class="product__item__text">
                            <h5><?php echo $row->titolo ?></h5>
                            <h6><?php echo $row->descrizione ?></h6>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="/"><img src="img/DPLogo_noback_white.png" alt=""></a>
                        </div>
                        <p> DigitalPhoto offre album fotografici di alta qualità, corsi di fotografia professionali e accessori per ogni
                            esigenza fotografica. Siamo il partner ideale per immortalare i tuoi momenti speciali e migliorare le tue abilità
                            fotografiche. </p>
                        <a href="/"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewsLetter</h6>
                        <div class="footer__newslatter">
                            <p>Iscriviti alla nostra Newsletter per offerte esclusive, consigli fotografici e le ultime novità di DigitalPhoto!</p>
                            <form action="/">
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
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/generics/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/generics/bootstrap.js') }}"></script>
    <script src="{{ asset('js/generics/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/generics/main.js') }}"></script>
</body>

</html>