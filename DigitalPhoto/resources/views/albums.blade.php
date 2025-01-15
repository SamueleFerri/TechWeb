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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <li> <a href="\"> Home </a> </li>
                <li class="active"> <a href="albums"> Album </a> </li>
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
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li> <a href="\"> Home </a> </li>
                            <li class="active"> <a href="albums"> Album </a> </li>
                            <li> <a href="gadgets"> Accessori </a> </li>
                            <li> <a href="courses"> Corsi </a> </li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Album</h4>
                        <div class="breadcrumb__links">
                            <a href="\">Home</a>
                            <span>Album</span>
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
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
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
                    <div class="row container__card">
                        <?php
                            foreach ($albums as $row){
                                $cont++;
                                $preferiti_list = DB::select('SELECT id FROM preferiti WHERE user_id = ?', [Auth::id()]);
                                $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
                                $preferiti_id = $preferiti_list[0]->id ?? null;
                                $carrelli_id = $carrelli_list[0]->id ?? null; 
                                $likeExists = DB::table('albums_in_preferiti')
                                                ->where('albums_id', $row->id)
                                                ->where('preferiti_id', $preferiti_id)
                                                ->exists();
                                $bagExists = DB::table('albums_in_carrelli')
                                                ->where('albums_id', $row->id)
                                                ->where('carrelli_id', $carrelli_id)
                                                ->exists();
                        ?>
                        <div class="col__dipslay__card col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals col__items__card">
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
                                <div class="row row__icon">
                                    <div class="col-6">
                                        <i 
                                            class="fa-solid fa-heart fa-xl like-icon {{ $likeExists ? 'liked' : 'not-liked' }}" 
                                            data-item-id="{{ $row->id }}" 
                                            style="padding-top: 20px; padding-bottom: 15px; cursor: pointer;">
                                        </i>
                                    </div>
                                    <div class="col-6">
                                        <i 
                                            class="fa-solid fa-bag-shopping fa-xl bag-icon {{ $bagExists ? 'inbag' : 'not-inbag' }}" 
                                            data-item-id="{{ $row->id }}"
                                            style="padding-top: 20px; padding-bottom: 15px; cursor: pointer;">
                                        </i>
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
                                <a class="active" href="albums">1</a>
                                <a href="albums">2</a>
                                <a href="albums">3</a>
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
                            <a href="#"><img src="img/DPLogo_noback_white.png" alt=""></a>
                        </div>
                        <p> DigitalPhoto offre album fotografici di alta qualità, corsi di fotografia professionali e accessori per ogni 
                            esigenza fotografica. Siamo il partner ideale per immortalare i tuoi momenti speciali e migliorare le tue abilità 
                            fotografiche. </p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
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
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Js Plugins -->
    <script src="{{ asset('js/generics/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/generics/bootstrap.js') }}"></script>
    <script src="{{ asset('js/generics/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/generics/main.js') }}"></script>
    <script src="{{ asset('js/like_for_views/albums.js') }}"></script>
    <script src="{{ asset('js/bag_for_views/bag_albums.js') }}"></script>
</body>

</html>