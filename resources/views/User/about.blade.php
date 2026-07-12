@extends('Layouts.Userslayouts')

@section('content')
    <!-- About Hero Section -->
    <section class="py-5" style="background:#008186;">
        <div class="container py-5">
            <div class="row align-items-center">

                <div class="col-lg-6 text-white">
                    <h1 class="display-4 fw-bold">
                        About Our Online E-Book System
                    </h1>

                    <p class="lead mt-4">
                        Discover thousands of inspiring books, explore amazing
                        stories, and enjoy a premium digital reading experience
                        with our modern e-book platform.
                    </p>

                    <a href="#" class="btn btn-light rounded-pill px-4 py-2 fw-bold mt-3">
                        Explore Books
                    </a>
                </div>


                <div class="col-lg-6 text-center mt-4 mt-lg-0">

                    <div class="position-relative">

                        <!-- Main Image Card -->
                        <div class="rounded-4 shadow-lg overflow-hidden">

                            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f" class="img-fluid"
                                style="height:420px; width:100%; object-fit:cover;">

                        </div>


                        <!-- Floating Card 1 -->
                        <div class="position-absolute top-0 start-0 bg-white shadow rounded-4 p-3 m-3">

                            <i class="bi bi-book-fill fs-2" style="color:#008186;"></i>

                            <h6 class="fw-bold mt-2 mb-0">
                                5000+ Books
                            </h6>

                            <small class="text-muted">
                                Available
                            </small>

                        </div>



                        <!-- Floating Card 2 -->
                        <div class="position-absolute bottom-0 end-0 bg-white shadow rounded-4 p-3 m-3">

                            <i class="bi bi-people-fill fs-2" style="color:#008186;"></i>

                            <h6 class="fw-bold mt-2 mb-0">
                                2000+ Readers
                            </h6>

                            <small class="text-muted">
                                Connected
                            </small>

                        </div>


                    </div>

                </div>

            </div>
        </div>
    </section>



    <!-- About Details -->
    <section class="py-5 bg-light">

        <div class="container">

            <div class="row g-4">


                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 rounded-4">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-book display-4" style="color:#008186;"></i>

                            <h4 class="fw-bold mt-3">
                                Huge Collection
                            </h4>

                            <p class="text-muted">
                                Explore different categories of books,
                                stories and educational materials.
                            </p>

                        </div>

                    </div>
                </div>



                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 rounded-4">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-people display-4" style="color:#008186;"></i>

                            <h4 class="fw-bold mt-3">
                                For Every Reader
                            </h4>

                            <p class="text-muted">
                                A perfect platform for students,
                                writers and book lovers.
                            </p>

                        </div>

                    </div>
                </div>




                <div class="col-lg-4">
                    <div class="card border-0 shadow h-100 rounded-4">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-lightbulb display-4" style="color:#008186;"></i>

                            <h4 class="fw-bold mt-3">
                                Knowledge & Creativity
                            </h4>

                            <p class="text-muted">
                                Improve your knowledge and discover
                                creative ideas through books.
                            </p>

                        </div>

                    </div>
                </div>


            </div>

        </div>

    </section>




    <!-- Mission Section -->

    <section class="py-5">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h2 class="fw-bold">
                        Our Mission
                    </h2>

                    <p class="text-muted fs-5">
                        Our mission is to provide a simple, modern and
                        user-friendly e-book platform where readers can
                        easily find their favorite books and enjoy digital reading.
                    </p>


                    <ul class="list-unstyled">

                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill me-2" style="color:#008186;"></i>
                            Easy book browsing experience
                        </li>

                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill me-2" style="color:#008186;"></i>
                            Secure and user friendly system
                        </li>

                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill me-2" style="color:#008186;"></i>
                            Modern digital library solution
                        </li>

                    </ul>

                </div>



                <div class="col-lg-6">

                    <div class="p-5 rounded-4 shadow text-center" style="background:#008186;">

                        <h2 class="text-white fw-bold">
                            Read. Learn. Grow.
                        </h2>

                        <p class="text-white">
                            Your journey towards knowledge starts here.
                        </p>

                        <i class="bi bi-journal-richtext text-white display-1"></i>

                    </div>

                </div>


            </div>

        </div>

    </section>
@endsection
