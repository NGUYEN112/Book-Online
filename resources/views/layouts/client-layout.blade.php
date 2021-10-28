<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online E-Commerce</title>
</head>
<link rel="stylesheet" href="{{asset('/storage/styles/reset.css')}}">
<link rel="stylesheet" href="{{asset('/storage/styles/client-styles.css')}}">
@yield('client-styles')

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- font -->
<link href="http://fonts.cdnfonts.com/css/myriad-pro" rel="stylesheet">
<!-- <script src="{{asset('/storage/js/multislider.min.js')}}"></script> -->

<body>


    <!-- Topbar Start-->
    <div class="topbar">
        <div class="container">
            <ul class="topbar__list">
                @if(!auth()->user())
               
                <li class="topbar__item"><a href="/auth/login">Sign In</a></li>
                @else
                <li class="topbar__item"><a href="/auth/logout">Sign Out</a></li>
                @endif
                <li class="topbar__item"><a href="#">My Account</a></li>
                <li class="topbar__item"><a href="#">Order Status</a></li>
                <li class="topbar__item"><a href="#">Help</a></li>

            </ul>

        </div>

    </div>
    <!-- End Topbar -->

    <!-- Header Start -->
    <header class="header">
        <div class="container header__inner">
            <div class="header__logo">
                <img src="{{asset('/storage/images/header/logo.png')}}" alt="">
            </div>
            <ul class="header-navbar nav-cart">
                <li class="header__search">
                    <input type="text" placeholder="Search...">
                    <button><i class="far fa-search"></i> Search</button>
                </li>
                <li class="header__cart-inner nav-cart-item">
                    <div class=" header__cart">
                        <div class="header__cart-title">
                            <a href="javascript:;"><i class="fas fa-shopping-cart fa-3x"></i></a>
                            <h4>Your cart <span>(<span class="count-item">0</span> items)</span></h4>
                            
                        </div>

                        <div class=" header__cart-info">
                            <h3>$<span class="total_price"></span></h3>
                            <a href="/checkout">checkout</a>
                        </div>

                    </div>
                    <div class=" header__wish-list">
                        <img src="{{asset('/storage/images/header/wish-list.png')}}" alt="">
                        <p>Wish list </p> <sup>20</sup>
                    </div>
                </li>
            </ul>
            <div class="navbar-mobie">
                <ul class="nav-mobie">
                    <li class="cart">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </li>
                    <li class="wish">
                        <p>Wish list </p> <sup>20</sup>
                    </li>
                </ul>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Navbar Start -->
    <nav class="navbar">
        <div class="container">
            <ul class="navbar__list nav-menu">
                <li class="nav-item navbar__item "><a href="#">Computers</a> </li>
                <li class="navbar__item nav-item"><a href="#">Cooking</a> </li>
                <li class="navbar__item nav-item {{ (request()->segment(1) == 'Education') ? 'navbar-active' : '' }}">
                    <a href="/Education">Education</a>
                </li>
                <li class="navbar__item nav-item"><a href="#">Fiction</a></li>
                <li class="navbar__item nav-item"><a href="#">Health</a></li>
                <li class="navbar__item nav-item"><a href="#">Mathematics</a> </li>
                <li class="navbar__item nav-item"><a href="#"> Medical</a></li>
                <li class="navbar__item nav-item"><a href="#">Reference</a> </li>
                <li class="navbar__item nav-item"><a href="#"> Science</a></li>
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('client-content')

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container footer__category row ">
            <ul class="footer__category-list col-3 col-6-lg">
                <li class="footer__category-item">Biography & True Stories</li>
                <li class="footer__category-item"><a href="#">General</a></li>
                <li class="footer__category-item"><a href="#"> Diaries, Letters & Journals
                    </a></li>
                <li class="footer__category-item"><a href="#">Memoirs</a></li>
                <li class="footer__category-item"><a href="#">True Stories</a></li>
                <li class="footer__category-item"><a href="#">Generic Exams</a></li>
                <li class="footer__category-item"><a href="#">GK Titles</a></li>
                <li class="footer__category-item"><a href="#">Medical Entrance</a></li>
                <li class="footer__category-item"><a href="#">Other Entrance Exams</a></li>
                <li class="footer__category-item"><a href="#">PG Entrance Examinations</a></li>
                <li class="footer__category-item"><a href="#">Self-help Titles</a></li>
                <li class="footer__category-item"><a href="#">Sociology</a></li>
            </ul>

            <ul class="footer__category-list col-3 col-6-lg">
                <li class="footer__category-item">Professional & Reference </li>
                <li class="footer__category-item"><a href="#">Academic and Reference</a></li>
                <li class="footer__category-item"><a href="#">Business Trade</a></li>
                <li class="footer__category-item"><a href="#">Engineering and Computer Science</a></li>
                <li class="footer__category-item"><a href="#">Humanities, Social Sciences and Languages</a></li>
                <li class="footer__category-item"><a href="#">Introduction to Computers</a></li>
                <li class="footer__category-item"><a href="#">Science and Maths</a></li>
                <li class="footer__category-item"><a href="#">Trade Business</a></li>
                <li class="footer__category-item"><a href="#">English Language & Literature</a></li>
                <li class="footer__category-item"><a href="#">English Language Teaching</a></li>
                <li class="footer__category-item"><a href="#">Environment Awareness</a></li>
                <li class="footer__category-item"><a href="#">Environment Protection </a></li>
            </ul>

            <ul class="footer__category-list col-3 col-6-lg">
                <li class="footer__category-item">Earth Sciences</li>
                <li class="footer__category-item"><a href="#">Earth Sciences</a></li>
                <li class="footer__category-item"><a href="#">Geography</a></li>
                <li class="footer__category-item"><a href="#">The Environment</a></li>
                <li class="footer__category-item"><a href="#">Regional & Area Planning</a></li>
                <li class="footer__category-item"><a href="#">Fantasy</a></li>
                <li class="footer__category-item"><a href="#">Gay</a></li>
                <li class="footer__category-item"><a href="#">Humorous</a></li>
                <li class="footer__category-item"><a href="#">Interactive</a></li>
                <li class="footer__category-item"><a href="#">Legal</a></li>
                <li class="footer__category-item"><a href="#">Lesbian</a></li>
                <li class="footer__category-item"><a href="#">Men'S Adventure</a></li>
            </ul>

            <ul class="footer__category-list col-3 col-6-lg">
                <li class="footer__category-item">Mathematics</li>
                <li class="footer__category-item"><a href="#">Algebra</a></li>
                <li class="footer__category-item"><a href="#">Differential Equations</a></li>
                <li class="footer__category-item"><a href="#">Discrete Mathematics</a></li>
                <li class="footer__category-item"><a href="#">Fourier Analysis</a></li>
                <li class="footer__category-item"><a href="#">Numerical Analysis</a></li>
                <li class="footer__category-item"><a href="#">Probability</a></li>
                <li class="footer__category-item"><a href="#">Statistical Methods/data Analysis</a></li>
                <li class="footer__category-item"><a href="#">Stochastic And Random Processes</a></li>
                <li class="footer__category-item"><a href="#">Topology</a></li>
                <li class="footer__category-item"><a href="#">Statistics</a></li>
                <li class="footer__category-item"><a href="#">Mathematics</a></li>
            </ul>
        </div>
    </footer>

    <section class="bottom">
        <h2>We accept all major Credit Card/Debit Card/Internet Banking </h2>
        <div class="bottom__credit">
            <img src="{{asset('/storage/images/footer/crc1.jpg')}}" alt="">
            <img src="{{asset('/storage/images/footer/crc2.png')}}" alt="">
            <img src="{{asset('/storage/images/footer/cr3.jpg')}}" alt="">
        </div>
        <div class="bottom__line"></div>
        <h4> Conditions of Use Privacy Notice © 2012-2013, Booksonline, Inc. or its affiliates</h4>
    </section>
    <!-- Footer End -->
    <script src="{{asset('/storage/js/client.js')}}"></script>
    @yield('client-script')

</body>

</html>