<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Publication System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=book_ribbon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    /* Mega Menu */

    .mega-dropdown {
        position: static;
    }

    .mega-dropdown .dropdown-menu {

        width: 100%;
        max-width: 1100px;

        left: 50%;
        transform: translateX(-50%);

        margin-top: 15px;

        display: none;

        border: none;

        border-radius: 20px;

        box-shadow: 0 20px 45px rgba(0, 0, 0, .15);

        padding: 35px;

        animation: megaMenu .35s ease;

    }

    .mega-dropdown:hover .dropdown-menu {

        display: block;

    }

    @keyframes megaMenu {

        from {

            opacity: 0;

            transform: translate(-50%, -15px);

        }

        to {

            opacity: 1;

            transform: translate(-50%, 0);

        }

    }

    /* Category Hover */

    .category-item {

        transition: .3s;

    }

    .category-item:hover {

        background: #F8F9FA;

        border-radius: 10px;

        padding-left: 12px;

    }

    .category-item:hover a {

        color: #198754 !important;

    }

    /* Image Hover */

    .book-image {

        transition: .4s;

    }

    .book-image:hover {

        transform: scale(1.05);

    }

    @media(max-width:991px) {

        .mega-dropdown .dropdown-menu {

            position: static;

            display: block;

            transform: none;

            width: 100%;

            max-width: 100%;

            margin-top: 0;

            box-shadow: none;

        }

    }
</style>



<body>



    <!-- Navbar start -->


    <nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm">
        <div class="container-fluid px-5">

            <!-- Logo -->
            <a href="/"
                class="navbar-brand d-flex align-items-center fw-bold fs-2 text-dark text-decoration-none">

                <span class="material-symbols-outlined fs-1 me-2">
                    book_ribbon
                </span>

                Libranova

            </a>

            <!-- Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <!-- Links -->
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a href="/" class="nav-link active text-success  fs-5">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown mega-dropdown">

                        <a href="#" class="nav-link text-dark d-flex align-items-center   fs-5">

                            Categories
                            <i class="bi bi-chevron-down" style="font-size:18px;font-weight:900;"></i>

                        </a>

                        <div class="dropdown-menu p-4 border-0 shadow-lg rounded-4 start-50 translate-middle-x mt-0">

                            <div class="container">

                                <div class="row align-items-center">

                                    <!-- Left -->

                                    <div class="col-lg-8">

                                        <h3 class="fw-bold mb-4">

                                            Book Categories

                                        </h3>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <ul class="list-unstyled">

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Children's Books

                                                        </a>


                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Comics

                                                        </a>

                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Novels

                                                        </a>

                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Story Books

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                                <ul class="list-unstyled">

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            General Knowledge

                                                        </a>

                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Urdu Poetry

                                                        </a>

                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href="{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Quiz Books

                                                        </a>

                                                    </li>

                                                    <li class="category-item py-3 border-bottom">

                                                        <a href{{ route('books') }}"
                                                            class="text-decoration-none text-dark fs-5">

                                                            Journals

                                                        </a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>

                                        <a href="{{ route('books') }}"
                                            class="btn btn-success rounded-pill px-5 py-3 mt-4">

                                            Explore All

                                            <i class="bi bi-arrow-right ms-2"></i>

                                        </a>

                                    </div>



                                    <div class="col-lg-4 text-center">

                                        <div class="bg-light rounded-4 p-4">

                                            <img src="{{ asset('images/BookCategories.jpg') }}"
                                                class="img-fluid book-image" style="height:320px;object-fit:contain;">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link text-dark   fs-5">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('blog') }}" class="nav-link  text-dark   fs-5">
                            Blog
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('books') }}" class="nav-link text-dark  fs-5">
                            Books
                        </a>
                    </li>

                </ul>

                <!-- Right Side -->
                <div class="d-flex align-items-center gap-3">

                    <!-- Search -->
                    <div class="input-group border rounded-pill overflow-hidden d-none d-lg-flex"
                        style="max-width:250px;">

                        <input type="text" name="search" class="form-control border-0 shadow-none px-3"
                            placeholder="Search Books">

                        <span class="input-group-text bg-white border-0 px-3">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>

                    </div>

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="position-relative text-dark">

                        <i class="bi bi-cart3 fs-4"></i>

                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            {{ \App\Models\Cart::where('session_id', session()->getId())->count() }}

                        </span>

                    </a>

                    @auth

                        <div class="dropdown">

                            <a href="#" class="text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">

                                <img src="{{ Auth::user()->image ? asset('uploads/profile/' . Auth::user()->image) : asset('images/default-user.png') }}"
                                    class="rounded-circle border border-2" width="45" height="45"
                                    style="object-fit:cover;" alt="Profile">

                            </a>

                            <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 p-4"
                                style="width:320px;">

                                <div class="text-center">

                                    <img src="{{ Auth::user()->image ? asset('uploads/profile/' . Auth::user()->image) : asset('images/default-user.png') }}"
                                        class="rounded-circle border border-3 mb-3" width="90" height="90"
                                        style="object-fit:cover;" alt="Profile">

                                    <h5 class="fw-bold mb-1">
                                        {{ Auth::user()->name }}
                                    </h5>

                                    <small class="text-muted">
                                        {{ Auth::user()->email }}
                                    </small>

                                </div>

                                <hr>

                                <a href="{{ route('profile') }}" class="dropdown-item rounded-3 py-2">
                                    <i class="bi bi-person-circle me-2"></i>
                                    My Profile
                                </a>
                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf

                                    <button type="submit" class="dropdown-item rounded-3 py-2 text-danger">

                                        <i class="bi bi-box-arrow-right me-2"></i>

                                        Logout

                                    </button>

                                </form>

                            </div>

                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill">

                            Login

                        </a>

                        <a href="{{ route('register') }}" class="btn text-white rounded-pill"
                            style="background:#8b5e3c">

                            Register

                        </a>

                    @endauth

                </div>

            </div>

        </div>
    </nav>
    @if (session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">

            <div class="toast show shadow-lg border-0">

                <div class="toast-header text-white" style="background:#008186;">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    <strong class="me-auto">

                        Success

                    </strong>

                    <button type="button" class="btn-close" data-bs-dismiss="toast">
                    </button>

                </div>

                <div class="toast-body">

                    {{ session('success') }}

                </div>

            </div>

        </div>
    @endif



    <!-- Navbar End -->



    @yield('content')
    <!-- footer  start -->
    <footer class="pt-5 pb-3 text-white" style="background:#008186;">

        <div class="container">

            <div class="row g-5">

                <!-- Logo -->

                <div class="col-lg-4">

                    <h2 class="fw-bold">

                        <i class="bi bi-book-half me-2"></i>

                        E-Book

                    </h2>

                    <p class="mt-4">

                        Discover thousands of books, connect with talented
                        authors, participate in exciting competitions,
                        and enjoy an amazing online reading experience.

                    </p>

                    <div class="d-flex gap-3 mt-4">

                        <a href="#"
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none"
                            style="width:45px;height:45px;">

                            <i class="bi bi-facebook" style="color:#008186;"></i>

                        </a>

                        <a href="#"
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none"
                            style="width:45px;height:45px;">

                            <i class="bi bi-instagram" style="color:#008186;"></i>

                        </a>

                        <a href="#"
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none"
                            style="width:45px;height:45px;">

                            <i class="bi bi-twitter-x" style="color:#008186;"></i>

                        </a>

                        <a href="#"
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none"
                            style="width:45px;height:45px;">

                            <i class="bi bi-linkedin" style="color:#008186;"></i>

                        </a>

                    </div>

                </div>

                <!-- Quick Links -->

                <div class="col-lg-2 col-md-6">

                    <h4 class="fw-bold mb-4">

                        Quick Links

                    </h4>

                    <ul class="list-unstyled">

                        <li class="mb-3">
                            <a href="/" class="text-white text-decoration-none">
                                Home
                            </a>
                        </li>

                        <li class="mb-3">
                            <a href="{{ route('about') }}" class="text-white text-decoration-none">
                                About Us
                            </a>
                        </li>

                        <li class="mb-3">
                            <a href="{{ route('blog') }}" class="text-white text-decoration-none">
                                Blog
                            </a>

                        <li class="mb-3">
                            <a href="#" class="text-white text-decoration-none">
                                Authors
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('books') }}" class="text-white text-decoration-none">
                                books
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- Categories -->

                <div class="col-lg-3 col-md-6">

                    <h4 class="fw-bold mb-4">

                        Categories

                    </h4>

                    <ul class="list-unstyled">

                        <li class="mb-3"> Fiction Books</li>

                        <li class="mb-3"> Story Books</li>

                        <li class="mb-3"> Educational Books</li>

                        <li class="mb-3"> Competitions</li>

                        <li> Authors</li>

                    </ul>

                </div>

                <!-- Contact -->

                <div class="col-lg-3">

                    <h4 class="fw-bold mb-4">

                        Contact Info

                    </h4>

                    <p>
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Karachi, Pakistan
                    </p>

                    <p>
                        <i class="bi bi-envelope-fill me-2"></i>
                        support@ebook.com
                    </p>

                    <p>
                        <i class="bi bi-telephone-fill me-2"></i>
                        +92 300 1234567
                    </p>

                    <p>
                        <i class="bi bi-clock-fill me-2"></i>
                        Mon - Fri (9AM - 6PM)
                    </p>

                </div>

            </div>

            <hr class="border-light my-5">

            <!-- Bottom -->

            <div class="row align-items-center">

                <div class="col-md-6 text-center text-md-start">

                    <p class="mb-0">

                        © 2026 E-Book System. All Rights Reserved.

                    </p>

                </div>

                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">

                    <a href="#" class="text-white text-decoration-none me-3">

                        Privacy Policy

                    </a>

                    <a href="#" class="text-white text-decoration-none me-3">

                        Terms & Conditions

                    </a>

                    <a href="#" class="text-white text-decoration-none">

                        Help Center

                    </a>

                </div>

            </div>

        </div>

    </footer>


    <!-- footr End -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
