<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="{{asset('/storage/styles/reset.css')}}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><!-- Font Awesome CSS-->
<!-- orion icons-->
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{asset('/storage/admin/admin_assets/css/style.default.css')}}">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="{{asset('/storage/admin/admin_assets/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/storage/admin/admin_assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/storage/styles/manager-styles.css')}}">


<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <div class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead" style="cursor: pointer;"><i class="fas fa-align-left"></i></div><a href="" class="navbar-brand font-weight-bold text-uppercase text-base">ADMIN Dashboard</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item">
                    <form id="searchForm" class="ml-auto d-none d-lg-block">
                        <div class="form-group position-relative mb-0">
                            <button type="submit" style="top: -3px; left: 0;" class="position-absolute bg-white border-0 p-0"><i class="o-search-magnify-1 text-gray text-lg"></i></button>
                            <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
                        </div>
                    </form>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <a id="userInfo" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{asset('/storage/images/avt.jpg')}}" alt="" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                    <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"></strong></a>
                        <div class=" dropdown-divider">
                        </div><a href="/" class="dropdown-item">Client</a>
                        <div class="dropdown-divider"></div><a href="/auth/logout" class="dropdown-item">Logout</a>
                    </div>
                </li>


            </ul>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">
                Manager</div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="/manager" class="sidebar-link text-dark"><i class="o-home-1 me-3 text-gray"></i><span>Home</span></a>
                </li>

                <li class="sidebar-list-item {{ (request()->segment(2) == 'categories') ? 'navbar-active' : '' }}">
                    <a href="/manager/categories" class="sidebar-link text-gray">
                        <i class="fal fa-book-reader me-3 text-gray"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-list-item {{ (request()->segment(2) == 'genre-group') ? 'navbar-active' : '' }}">
                    <a href="/manager/genre-group" class="sidebar-link text-gray">
                        <i class="fal fa-bookmark me-3 text-gray"></i>
                        <span>Genre Group</span>
                    </a>
                </li>

                <li class="sidebar-list-item {{ (request()->segment(2) == 'genres') ? 'navbar-active' : '' }}">
                    <a href="/manager/genres" class="sidebar-link text-gray">
                        <i class="fal fa-address-book me-3 text-gray"></i>
                        <span>Genres</span>
                    </a>
                </li>

                <li class="sidebar-list-item {{ (request()->segment(2) == 'products') ? 'navbar-active' : '' }}">
                    <a href="/manager/products" class="sidebar-link text-gray">
                        <i class="fal fa-book me-3 text-gray"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="sidebar-list-item {{ (request()->segment(2) == 'discounts') ? 'navbar-active' : '' }}">
                    <a href="/manager/discounts" class="sidebar-link text-gray">
                        <i class="fal fa-percent me-3 text-gray"></i>
                        <span>Discounts</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">
                <section class="py-5">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="card">
                                @yield('admin-content')
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-left text-primary">
                    <p class="mb-2 mb-md-0">Hoai Nguyen &copy; 2021</p>
                </div>
                <div class="col-md-6 text-center text-md-right text-gray-400">
                    <p class="mb-0">Design by
                        <Strong>Gainer</Strong>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $('.sidebar-toggler').click(function() {
            $('.sidebar').toggleClass("show-side")
            // $('.fa-sort-down').toggleClass("click")
        })
    </script>
</body>

</html>

<!-- <ul class="category-list sidebar-menu list-unstyled">
                        <li class="sidebar-list-item category-item {{ (request()->segment(3) == 'genre-group') ? 'subnav-active' : '' }}">
                            <a href="/manager/genre-group" class="sidebar-link">
                                <span>Genre Group</span>
                            </a>
                        </li>
                        <li class="sidebar-list-item category-item {{ (request()->segment(3) == 'genres') ? 'subnav-active' : '' }}">
                            <a href="/manager/genres" class="sidebar-link">
                                <span>Genres</span>
                            </a>
                        </li>
                        <li class="sidebar-list-item category-item {{ (request()->segment(3) == 'products') ? 'subnav-active' : '' }}">
                            <a href="/manager/products" class="sidebar-link">
                                <span>Products</span>
                            </a>
                        </li>
                    </ul> -->