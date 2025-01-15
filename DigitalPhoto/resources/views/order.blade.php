<?php
    
    use Illuminate\Support\Facades\DB;

    $albums_bag = DB::select('SELECT a.id, a.titolo, a.descrizione, a.prezzo FROM albums a JOIN albums_in_carrelli ac ON a.id = ac.albums_id
                                JOIN carrelli c ON ac.carrelli_id = c.id');
    $gadgets_bag = DB::select('SELECT g.id, g.descrizione, g.prezzo FROM gadgets g JOIN gadgets_in_carrelli gc ON g.id = gc.gadgets_id
                                    JOIN carrelli c ON gc.carrelli_id = c.id');
    $courses_bag = DB::select('SELECT c.id, c.nome, c.descrizione, c.prezzo FROM corsi c JOIN corsi_in_carrelli cc ON c.id = cc.corsi_id
                                    JOIN carrelli ca ON cc.carrelli_id = ca.id');

    $is_cart_empty = empty($albums_bag) && empty($courses_bag) && empty($gadgets_bag);

    $tot = 0;
    $max_output = 0;
    $max_chars = 20;
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
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li> <a href="\"> Home </a> </li>
                            <li> <a href="albums"> Album </a> </li>
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
                        <h4>Conferma Ordine</h4>
                        <div class="breadcrumb__links">
                            <a href="bag">Carrello</a>
                            <span>Conferma Ordine</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="checkout">
        <div class="container">
            <div class="row order-row">
                <!-- Billing Details -->
                <div class="col-lg-8">
                    <h4 class="order-h4">Dettagli Fatturazione</h4>
                    <form action="#" method="POST" class="checkout__form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <label for="name">Nome <span>*</span></label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <label for="surname">Cognome <span>*</span></label>
                                    <input type="text" id="surname" name="surname" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input data-checkout">
                            <label for="address">Indirizzo <span>*</span></label>
                            <input type="text" id="address" name="address" placeholder="Via e numero civico" required>
                        </div>
                        <div class="checkout__input data-checkout">
                            <label for="city">Città <span>*</span></label>
                            <input type="text" id="city" name="city" required>
                        </div>
                        <div class="checkout__input data-checkout">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="checkout__input data-checkout">
                            <label for="phone">Telefono <span>*</span></label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                    </form>
                </div>
    
                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h4>Riepilogo Ordine</h4>
                        <div class="checkout-order-sub">Prodotti: <span class="checkout-span">Totale:</span></div>
                        <ul>
                            <?php 
                                foreach($albums_bag as $album){
                                    if($max_output >= 5) {
                                        break;
                                    }
                                    $max_output++;
                                    $tot += (float)$album->prezzo;
                            ?>
                            <li class="checkout-li">Album: <?php echo mb_strimwidth(htmlspecialchars($album->titolo), 0, $max_chars, "...") ?><span class="checkout-span"><?php echo number_format($album->prezzo, 2)
                             ?> $</span></li>
                            <?php 
                                }
                            ?>
                            <?php 
                                foreach($gadgets_bag as $gadget){
                                    if($max_output >= 5) {
                                        break;
                                    }
                                    $tot += (float)$gadget->prezzo;
                                    $max_output++;
                            ?>
                            <li class="checkout-li">Gadget: <?php echo mb_strimwidth(htmlspecialchars($gadget->descrizione), 0, $max_chars, "...") ?><span class="checkout-span"><?php echo number_format($gadget->prezzo, 2) ?> $</span></li>
                            <?php 
                                }
                            ?>
                            <?php 
                                foreach($courses_bag as $course){
                                    if($max_output >= 5) {
                                        break;
                                    }
                                    $max_output++;
                                    $tot += (float)$course->prezzo;
                            ?>
                            <li class="checkout-li">Corsi: <?php echo mb_strimwidth(htmlspecialchars($course->nome), 0, $max_chars, "...") ?><span class="checkout-span"><?php echo number_format($course->prezzo, 2) ?> $</span></li>
                            <?php 
                                }
                            ?>
                            <?php 
                                if($max_output >= 5) {
                                    echo '<li class="checkout-li">........</li>';
                                }
                            ?>
                        </ul>
                        <div class="check-row">
                            <div>Subtotale <span class="checkout-span"><?php echo $tot ?> $</span></div>   
                            <div>Totale <span class="checkout-span"><?php echo $tot ?> $</span></div>
                        </div>
                        <!-- Payment Method -->
                        <div class="checkout__input__checkbox">
                            <label for="cash">
                                Pagamento alla Consegna
                                <input type="checkbox" id="cash" name="payment_method" value="cash">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="card">
                                Carta di Credito
                                <input type="checkbox" id="card" name="payment_method" value="card">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <div class="row">
                            <button class="primary-btn buy <?php if ($is_cart_empty) echo 'disabled-button'; ?>" 
                                <?php if ($is_cart_empty) echo 'disabled'; ?> onclick="emptyCart(<?php echo $tot?>)">
                                Invia Ordine
                            </button>
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
    <script src="{{ asset('js/empty-cart.js') }}"></script>
</body>

</html>