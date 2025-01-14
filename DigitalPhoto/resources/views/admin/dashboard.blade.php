<?php
    
    use Illuminate\Support\Facades\DB;

    $totAlbums = DB::table('albums')->count();
    $totGadgets = DB::table('gadgets')->count();
    $totCourses = DB::table('corsi')->count();

    $orders = DB::select('SELECT ordini.data, ordini.totale_ordine, users.email, ordini.id 
                            FROM ordini JOIN carrelli ON ordini.carrelli_id = carrelli.id
                                        JOIN users ON carrelli.user_id = users.id');

    $sellForYear = DB::table('ordini')
        ->select(DB::raw('YEAR(data) as anno'), DB::raw('count(*) as totale'))
        ->groupBy(DB::raw('YEAR(data)'))
        ->get();

    $query = "
                SELECT 
                users.email
                FROM ordini
                JOIN carrelli ON ordini.carrelli_id = carrelli.id
                JOIN users ON carrelli.user_id = users.id
                WHERE orders.id = :order_id
            ";
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="DigitalPhoto">
    <link rel="icon" type="image/x-icon" href="../faviconDP.ico">
    {{-- <meta name="keywords" content="Male_Fashion, unica, creative, html"> --}}
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

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <nav class="mobile__menu">
            <ul>
                <li class="active"> <a href="dashboard"> Dashboard </a> </li>
                <li> <a href="notifications"> Notifiche </a> </li>
            </ul>
        </nav>
        <div class="offcanvas__nav__option">
            <div class="offcanvas_btn-LoginRegister">
                @if (Route::has('login'))
                @auth
                    <a class="icon__header" href="notifications"> <i class="fa-solid fa-bell fa-lg"></i> </a>
                    <div class="dropdown__user icon__header">
                        <a> <i class="fa-solid fa-user fa-lg"></i> </a>
                        <div class="dropdown__user__links">
                            <a href="{{ route('profile.edit_admin') }}">Profilo</a>
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
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container__header">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="dashboard"><img src="../img/DPLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"> <a href="dashboard"> Dashboard </a> </li>
                            <li> <a href="notifications"> Notifiche </a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <nav class="header__menu">
                        @if (Route::has('login'))
                            @auth
                                <a class="icon__header" href="notifications"> <i class="fa-solid fa-bell fa-lg"></i> </a>
                                <div class="dropdown__user icon__header">
                                    <a> <i class="fa-solid fa-user fa-lg"></i> </a>
                                    <div class="dropdown__user__links">
                                        <a href="{{ route('profile.edit_admin') }}">Profilo</a>
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

    <!-- Shop Section Begin -->
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card chart-container">
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card chart-container">
                        <canvas id="chartLineColumn"></canvas>
                    </div>
                </div>

            </div>
            <div class="row order-row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Ordine</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data</th>
                                <th scope="col">Prezzo Totale</th>
                            </tr>
                        </thead>
                        <?php 
                            foreach($orders as $order){
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo $order->id?></td>
                                <td><?php echo $order->email?></td>
                                <td><?php echo $order->data ?></td>
                                <td><?php echo $order->totale_ordine ?> $</td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
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
                            <a href="dashboard"><img src="../img/DPLogo_noback_white.png" alt=""></a>
                        </div>
                        <p> DigitalPhoto offre album fotografici di alta qualità, corsi di fotografia professionali e accessori per ogni
                            esigenza fotografica. Siamo il partner ideale per immortalare i tuoi momenti speciali e migliorare le tue abilità
                            fotografiche. </p>
                        <a href="dashboard"><img src="../img/payment.png" alt=""></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script>
        var sellForYear = @json($sellForYear);
        var years = [];
        var coutForYear = [];
        sellForYear.forEach(function(item) {
            years.push(item.anno);
            coutForYear.push(item.totale);
        });
        const chartLineColumn = document.getElementById("chartLineColumn").getContext('2d');
        const myChartLineColumn = new Chart(chartLineColumn, {
          type: 'line',
          data: {
            labels: years,
            datasets: [{
              label: 'Numero Ordini Emessi',
              backgroundColor: 'rgb(0, 116, 217)',
              borderColor: 'rgb(9, 71, 111)',
              data: coutForYear,
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                }
              }]
            }
          },
        });
    </script>

    <script>
        var totGadgets = @json($totGadgets);
        var totCourses = @json($totCourses);
        var totAlbums = @json($totAlbums);
        const chartPie = document.getElementById("chartPie").getContext('2d');
        const myChartPie = new Chart(chartPie, {
            type: 'doughnut',
            data: {
            labels: ["Gadgets", "Corsi", "Album"],
            datasets: [{
                label: 'Articoli in Vendita',
                data: [totGadgets, totCourses, totAlbums],
                backgroundColor: ["#0074D9", "#FF4130", "#2ECC40"]
            }]
            },
        });
    </script>

</body>

</html>