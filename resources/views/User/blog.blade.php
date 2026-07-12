@extends('Layouts.Userslayouts')

@section('content')
    <!-- ================= BLOG HERO START ================= -->


    <style>
        /* ==========================================
                                                                                                                                                                           BLOG PAGE PREMIUM STYLE
                                                                                                                                                                        ========================================== */

        body {
            background: #f8f9fa;
        }

        /* Smooth Animation */

        * {
            transition: .35s ease;
        }

        /* Hero */

        .hero-title {

            line-height: 1.2;

        }

        /* Cards */

        .card {

            border: none;
            border-radius: 22px;
            overflow: hidden;

        }

        .card:hover {

            transform: translateY(-8px);

            box-shadow: 0 25px 60px rgba(0, 0, 0, .15) !important;

        }

        /* Images */

        .card img {

            transition: .5s;

        }

        .card:hover img {

            transform: scale(1.08);

        }

        /* Buttons */

        .btn {

            transition: .3s;

        }

        .btn:hover {

            transform: translateY(-2px);

        }

        /* Featured Card */

        .featured-card {

            overflow: hidden;

        }

        .featured-card img {

            transition: .6s;

        }

        .featured-card:hover img {

            transform: scale(1.06);

        }

        /* Badges */

        .badge {

            letter-spacing: .5px;

        }

        /* Newsletter */

        input.form-control {

            box-shadow: none !important;

        }

        input.form-control:focus {

            border-color: #008186;

        }

        /* Quote */

        blockquote {

            font-style: italic;

        }

        /* Statistics */

        .stats-card {

            background: white;

            border-radius: 20px;

            padding: 30px;

        }

        .stats-card:hover {

            background: #008186;

            color: white;

        }

        /* Links */

        a {

            text-decoration: none;

        }

        /* Section Space */

        section {

            overflow: hidden;

        }
    </style>
    <section class="position-relative overflow-hidden py-5"
        style="background:linear-gradient(135deg,#008186,#01696d); min-height:700px;">

        <div class="container">

            <div class="row align-items-center">

                <!-- ================= LEFT ================= -->

                <div class="col-lg-6 text-white">



                    <h1 class="display-3 fw-bold lh-sm">

                        Discover Amazing
                        <br>

                        <span class="text-warning">

                            Books, Stories &
                            Reading Ideas

                        </span>

                    </h1>

                    <p class="fs-5 mt-4 mb-4 text-white-50">

                        Explore book reviews, author stories, reading tips,
                        educational articles and the latest updates from our
                        Online E-Book System.

                    </p>

                    <!-- Buttons -->

                    <div class="d-flex flex-wrap gap-3 mb-5">

                        <a href="#latestBlogs" class="btn btn-warning btn-lg rounded-pill px-4 fw-semibold">

                            Explore Articles

                        </a>

                        <a href="#newsletter" class="btn btn-outline-light btn-lg rounded-pill px-4">

                            Join Community

                        </a>

                    </div>

                    <!-- Search -->

                    <div class="bg-white rounded-pill shadow p-2 d-flex">

                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search articles...">

                        <button class="btn rounded-pill px-4 text-white" style="background:#008186;">

                            <i class="bi bi-search"></i>

                        </button>

                    </div>

                    <!-- Category Pills -->

                    <div class="mt-4 d-flex flex-wrap gap-2">

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            Book Reviews
                        </span>

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            Writing Tips
                        </span>

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            Authors
                        </span>

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            Education
                        </span>

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                            Competitions
                        </span>

                    </div>

                </div>

                <!-- ================= RIGHT ================= -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <div class="position-relative text-center">

                        <!-- Main Image -->

                        <img src="{{ asset('images/block.avif') }}" class="img-fluid" style="max-height:550px;">

                        <!-- Floating Card -->

                        <div class="position-absolute top-0 end-0 bg-white rounded-4 shadow-lg p-3" style="width:210px;">

                            <div class="d-flex align-items-center">

                                <div class="rounded-circle d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;background:#008186;">

                                    <i class="bi bi-book text-white fs-3"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-0">
                                        5000+
                                    </h5>

                                    <small class="text-muted">
                                        Books Available
                                    </small>

                                </div>

                            </div>

                        </div>

                        <!-- Floating Card -->

                        <div class="position-absolute bottom-0 start-0 bg-white rounded-4 shadow-lg p-3"
                            style="width:220px;">

                            <div class="d-flex align-items-center">

                                <div class="rounded-circle d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;background:#ffc107;">

                                    <i class="bi bi-people-fill text-dark fs-4"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-0">
                                        2500+
                                    </h5>

                                    <small class="text-muted">

                                        Happy Readers

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Decorative Circles -->

        <div class="position-absolute rounded-circle"
            style="width:260px;height:260px;
               background:rgba(255,255,255,.05);
                 top:-70px;
                 right:-70px;">

        </div>

        <div class="position-absolute rounded-circle"
            style="width:180px;height:180px;
                 background:rgba(255,255,255,.06);
                 bottom:-60px;
                 left:-60px;">

        </div>

    </section>

    <!-- ================= BLOG HERO END ================= --><!-- ========================================= -->
    <!--        FEATURED ARTICLE SECTION           -->
    <!-- ========================================= -->

    <section class="py-5 bg-light" id="latestBlogs">

        <div class="container">

            <div class="text-center mb-5">



                <h2 class="fw-bold display-5 mt-3">

                    Our Editor's Pick

                </h2>

                <p class="text-muted">

                    Handpicked article for every book lover.

                </p>

            </div>


            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

                <div class="row g-0 align-items-center">

                    <div class="col-lg-6">

                        <img src="{{ asset('images/booksread.avif') }}" class="img-fluid w-100"
                            style="height:500px;object-fit:cover;">

                    </div>


                    <div class="col-lg-6">

                        <div class="p-5">



                            <h2 class="fw-bold mb-4">

                                Why Reading Books Can Completely
                                Transform Your Future

                            </h2>

                            <p class="text-muted fs-5">

                                Reading books improves your knowledge,
                                communication skills and creativity.
                                Every page opens a new world of ideas,
                                making you a better learner and thinker.

                            </p>


                            <div class="d-flex flex-wrap gap-4 mt-4 mb-4">

                                <div>

                                    <i class="bi bi-person-fill text-success"></i>

                                    <span class="text-muted">

                                        Admin

                                    </span>

                                </div>


                                <div>

                                    <i class="bi bi-calendar-event text-danger"></i>

                                    <span class="text-muted">

                                        July 2026

                                    </span>

                                </div>


                                <div>

                                    <i class="bi bi-clock-fill text-primary"></i>

                                    <span class="text-muted">

                                        5 min read

                                    </span>

                                </div>

                            </div>


                            <a href="#" class="btn rounded-pill px-4 py-2 text-white" style="background:#008186;">

                                Read Full Article

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ========================================= -->
    <!--          LATEST ARTICLES                  -->
    <!-- ========================================= -->

    <section class="py-5">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-5">

                <h2 class="fw-bold">

                    Latest Articles

                </h2>

                <a href="#" class="text-decoration-none fw-semibold" style="color:#008186;">

                    View All →

                </a>

            </div>


            <div class="row g-4">

                <!-- CARD 1 -->

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 h-100">

                        <img src="{{ asset('images/bestreads.jpg') }}" class="card-img-top"
                            style="height:250px;object-fit:cover;">

                        <div class="card-body p-4">

                            <span class="badge rounded-pill mb-3" style="background:#008186;">

                                Book Review

                            </span>

                            <h4 class="fw-bold">

                                Top 10 Books Every Student Must Read

                            </h4>

                            <p class="text-muted">

                                Discover inspiring books that help
                                students improve knowledge and skills.

                            </p>

                            <div class="d-flex justify-content-between small text-muted mt-4">

                                <span>

                                    <i class="bi bi-calendar"></i>

                                    July 2026

                                </span>

                                <span>

                                    <i class="bi bi-clock"></i>

                                    4 min

                                </span>

                            </div>

                            <a href="#" class="btn btn-outline-success rounded-pill mt-4">

                                Read More

                            </a>

                        </div>

                    </div>

                </div>



                <!-- CARD 2 -->

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 h-100">

                        <img src="{{ asset('images/improve.jfif') }}" class="card-img-top"
                            style="height:250px;object-fit:cover;">

                        <div class="card-body p-4">

                            <span class="badge bg-warning text-dark rounded-pill mb-3">

                                Writing Tips

                            </span>

                            <h4 class="fw-bold">

                                How To Become A Better Writer

                            </h4>

                            <p class="text-muted">

                                Simple techniques to improve your
                                creative writing and storytelling.

                            </p>

                            <div class="d-flex justify-content-between small text-muted mt-4">

                                <span>

                                    <i class="bi bi-calendar"></i>

                                    July 2026

                                </span>

                                <span>

                                    <i class="bi bi-clock"></i>

                                    6 min

                                </span>

                            </div>

                            <a href="#" class="btn btn-outline-warning rounded-pill mt-4">

                                Read More

                            </a>

                        </div>

                    </div>

                </div>



                <!-- CARD 3 -->

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 h-100">

                        <img src="{{ asset('images/readeveryday.jpg') }}" class="card-img-top"
                            style="height:250px;object-fit:cover;">

                        <div class="card-body p-4">

                            <span class="badge bg-danger rounded-pill mb-3">

                                Education

                            </span>

                            <h4 class="fw-bold">

                                Benefits Of Reading Every Day

                            </h4>

                            <p class="text-muted">

                                Daily reading improves focus,
                                memory and communication skills.

                            </p>

                            <div class="d-flex justify-content-between small text-muted mt-4">

                                <span>

                                    <i class="bi bi-calendar"></i>

                                    July 2026

                                </span>

                                <span>

                                    <i class="bi bi-clock"></i>

                                    5 min

                                </span>

                            </div>

                            <a href="#" class="btn btn-outline-danger rounded-pill mt-4">

                                Read More

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- ===================================================== -->
    <!--               TRENDING THIS WEEK                       -->
    <!-- ===================================================== -->

    <section class="py-5" style="background:#f8f9fa;">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-5">

                <div>



                    <h2 class="fw-bold mt-3">

                        Trending This Week

                    </h2>

                </div>

                <a href="#" class="text-decoration-none fw-semibold" style="color:#008186;">

                    View All →

                </a>

            </div>



            <div class="row g-4">

                <!-- ================= LEFT BIG CARD ================= -->

                <div class="col-lg-7">

                    <div class="card border-0 shadow-lg rounded-5 overflow-hidden h-100">

                        <div class="position-relative">

                            <img src="{{ asset('images/futurelibrary.jfif') }}" class="img-fluid w-100"
                                style="height:550px;object-fit:cover;">

                            <div class="position-absolute bottom-0 start-0 w-100 p-5"
                                style="background:linear-gradient(to top,rgba(0,0,0,.85),transparent);">

                                <span class="badge bg-warning text-dark rounded-pill mb-3">

                                    Editor's Pick

                                </span>

                                <h2 class="text-white fw-bold">

                                    The Future Of Digital Reading &
                                    Online Libraries

                                </h2>

                                <p class="text-white-50">

                                    Discover how e-books are transforming education,
                                    learning and the future of modern libraries.

                                </p>

                                <div class="d-flex gap-4 text-white mt-4">

                                    <span>

                                        <i class="bi bi-calendar-event"></i>

                                        July 2026

                                    </span>

                                    <span>

                                        <i class="bi bi-clock"></i>

                                        8 min read

                                    </span>

                                    <span>

                                        <i class="bi bi-eye"></i>

                                        12.5K Views

                                    </span>

                                </div>

                                <a href="#" class="btn btn-warning rounded-pill px-4 mt-4">

                                    Read Article

                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= RIGHT SIDE ================= -->

                <div class="col-lg-5">

                    <div class="row g-4">

                        @php

                            $articles = [
                                ['slide2.jfif', 'Top 5 Reading Habits', 'Book Review'],

                                ['small2.jpg', 'How To Improve Writing', 'Writing Tips'],

                                ['small3.jpg', 'Best Books For Students', 'Education'],
                            ];

                        @endphp

                        @foreach ($articles as $item)
                            <div class="col-12">

                                <div class="card border-0 shadow rounded-4">

                                    <div class="row g-0 align-items-center">

                                        <div class="col-4">

                                            <img src="{{ asset('images/' . $item[0]) }}" class="img-fluid h-100 w-100"
                                                style="object-fit:cover;height:150px;">

                                        </div>

                                        <div class="col-8">

                                            <div class="card-body">



                                                <h5 class="fw-bold">

                                                    {{ $item[2] }}

                                                </h5>

                                                <div class="small text-muted">

                                                    <i class="bi bi-calendar"></i>

                                                    July 2026

                                                    &nbsp;&nbsp;

                                                    <i class="bi bi-clock"></i>

                                                    3 min read

                                                </div>

                                                <a href="#"
                                                    class="text-decoration-none fw-semibold d-inline-block mt-3"
                                                    style="color:#008186;">

                                                    Read More →

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ================= CATEGORIES ================= -->

    <section class="py-5">

        <div class="container text-center">

            <h2 class="fw-bold mb-5">

                Explore By Category

            </h2>

            <div class="d-flex flex-wrap justify-content-center gap-3">

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    📚 Book Reviews

                </a>

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    📖 New Releases

                </a>

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    ✍ Writing Tips

                </a>

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    🎓 Education

                </a>

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    🏆 Competitions

                </a>

                <a href="#" class="btn btn-outline-success rounded-pill px-4 py-2">

                    💡 Motivation

                </a>

            </div>

        </div>

    </section>

    <!-- ====================================================== -->
    <!--              READING COMMUNITY SECTION                 -->
    <!-- ====================================================== -->

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">


                    <h2 class="display-5 fw-bold">

                        Become Part Of Our
                        Reading Community

                    </h2>

                    <p class="text-muted fs-5 mt-4">

                        Join thousands of readers who explore inspiring books,
                        discover new authors, improve their knowledge and enjoy
                        a modern digital reading experience every day.

                    </p>

                    <div class="row mt-5">

                        <div class="col-6 mb-4">

                            <div class="d-flex">

                                <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;">

                                    <i class="bi bi-book"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-1">

                                        5000+

                                    </h5>

                                    <small class="text-muted">

                                        Digital Books

                                    </small>

                                </div>

                            </div>

                        </div>



                        <div class="col-6 mb-4">

                            <div class="d-flex">

                                <div class="rounded-circle bg-warning text-dark d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;">

                                    <i class="bi bi-people-fill"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-1">

                                        2500+

                                    </h5>

                                    <small class="text-muted">

                                        Readers

                                    </small>

                                </div>

                            </div>

                        </div>



                        <div class="col-6">

                            <div class="d-flex">

                                <div class="rounded-circle bg-danger text-white d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;">

                                    <i class="bi bi-pencil-square"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-1">

                                        400+

                                    </h5>

                                    <small class="text-muted">

                                        Authors

                                    </small>

                                </div>

                            </div>

                        </div>



                        <div class="col-6">

                            <div class="d-flex">

                                <div class="rounded-circle text-white d-flex justify-content-center align-items-center"
                                    style="width:55px;height:55px;background:#008186;">

                                    <i class="bi bi-trophy-fill"></i>

                                </div>

                                <div class="ms-3">

                                    <h5 class="fw-bold mb-1">

                                        120+

                                    </h5>

                                    <small class="text-muted">

                                        Competitions

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="col-lg-6">

                    <img src="{{ asset('images/partsofcommunity.webp') }}" class="img-fluid">

                </div>

            </div>

        </div>

    </section>




    <!-- ====================================================== -->
    <!--                  QUOTE SECTION                         -->
    <!-- ====================================================== -->

    <section class="py-5 text-center text-white" style="background:#008186;">

        <div class="container">

            <i class="bi bi-quote display-1 opacity-50"></i>

            <h2 class="display-6 fw-bold">

                "A reader lives a thousand lives before he dies.
                The man who never reads lives only one."

            </h2>

            <p class="mt-4 fs-5">

                George R. R. Martin

            </p>

        </div>

    </section>




    <!-- ====================================================== -->
    <!--                 NEWSLETTER SECTION                     -->
    <!-- ====================================================== -->

    <section class="py-5 bg-light" id="newsletter">

        <div class="container">

            <div class="card border-0 rounded-5 shadow-lg">

                <div class="card-body p-5 text-center">



                    <h2 class="fw-bold display-5">

                        Stay Updated With New Books

                    </h2>

                    <p class="text-muted fs-5">

                        Subscribe to receive the latest articles,
                        book recommendations and exciting updates.

                    </p>

                    <div class="row justify-content-center mt-5">

                        <div class="col-lg-7">

                            <div class="input-group input-group-lg">

                                <input type="email" class="form-control rounded-start-pill border-0 shadow-none"
                                    placeholder="Enter Your Email Address">

                                <button class="btn text-white rounded-end-pill px-5" style="background:#008186;">

                                    Subscribe

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>




    <!-- ====================================================== -->
    <!--                   CALL TO ACTION                       -->
    <!-- ====================================================== -->
@endsection
