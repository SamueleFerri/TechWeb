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
    @vite(['resources/css/app.css'])
</head>

<body>

    <!-- Menu Mobile Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <nav class="mobile__menu">
            <ul>
                <li> <a href="admin/dashboard"> Dashboard </a> </li>
                <li> <a href="admin/notifications"> Notifiche </a> </li>
            </ul>
        </nav>
        <div class="offcanvas__nav__option">
            <div class="offcanvas_btn-LoginRegister">
                @if (Route::has('login'))
                @auth
                    <a class="icon__header" href="admin/notifications"> <i class="fa-solid fa-bell fa-lg"></i> </a>
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
    <!-- Menu Mobile End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container__header">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="admin/dashboard"><img src="../img/DPLogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu">
                        <ul>
                            <li> <a href="admin/dashboard"> Dashboard </a> </li>
                            <li> <a href="admin/notifications"> Notifiche </a> </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <nav class="header__menu">
                        @if (Route::has('login'))
                            @auth
                                <a class="icon__header" href="admin/notifications"> <i class="fa-solid fa-bell fa-lg"></i> </a>
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

    <!-- Profile Functions Begin -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile-admin.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile-admin.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile-admin.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Functions Begin -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/generics/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/generics/bootstrap.js') }}"></script>
    <script src="{{ asset('js/generics/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/generics/main.js') }}"></sc>
    @vite(['resources/js/app.js'])
</body>

</html>
