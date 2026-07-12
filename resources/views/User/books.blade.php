@extends('Layouts.Userslayouts')

@section('content')
    <!-- ========================= -->
    <!--      BOOK HERO START      -->
    <!-- ========================= -->

    <section class="py-5 overflow-hidden" style="background:linear-gradient(135deg,#008186,#016d71); min-height:700px;">

        <div class="container">

            <div class="row align-items-center">

                <!-- Left -->

                <div class="col-lg-6 text-white">



                    <h1 class="display-3 fw-bold mb-4">

                        Discover Your
                        <span class="text-warning">

                            Next Favorite Book

                        </span>

                    </h1>

                    <p class="lead text-white-50 mb-5">

                        Browse thousands of books from different categories.
                        Whether you're looking for best sellers, discounted books,
                        or the latest releases, your next great read is waiting here.

                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <a href="{{ route('books') }}" class="btn btn-dark btn-lg rounded-pill px-5">

                            Explore Collection

                        </a>

                        <a href="{{ route('offer.books') }}" class="btn btn-outline-light btn-lg rounded-pill px-5">

                            View Offers

                        </a>

                    </div>

                    <!-- Search -->

                    <div class="bg-white rounded-pill shadow-lg p-2 mt-5">

                        <form>

                            <div class="input-group">

                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search books by title, author or category...">

                                <button class="btn text-white rounded-pill px-4" style="background:#008186;">

                                    <i class="bi bi-search"></i>

                                    Search

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- Right -->

                <div class="col-lg-6 mt-5 mt-lg-0">

                    <div class="position-relative text-center">

                        <img src="{{ asset('images/bookhome.avif') }}" class="img-fluid" style="max-height:580px;">

                        <!-- Floating Card -->

                        <div class="position-absolute top-0 end-0 bg-white rounded-4 shadow-lg p-3">

                            <h4 class="fw-bold text-success mb-1">

                                5000+

                            </h4>

                            <p class="text-muted mb-0">

                                Books Available

                            </p>

                        </div>

                        <!-- Floating Card -->

                        <div class="position-absolute bottom-0 start-0 bg-white rounded-4 shadow-lg p-3">

                            <h4 class="fw-bold text-warning mb-1">

                                2500+

                            </h4>

                            <p class="text-muted mb-0">

                                Happy Readers

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================= -->
    <!--      QUICK STATS          -->
    <!-- ========================= -->

    <section class="py-5 bg-light">

        <div class="container">

            <div class="row text-center g-4">

                <div class="col-md-3">

                    <div class="bg-white rounded-4 shadow p-4">

                        <i class="bi bi-book-half display-5 mb-3" style="color:#008186;"></i>

                        <h2 class="fw-bold">

                            5000+

                        </h2>

                        <p class="text-muted mb-0">

                            Books

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="bg-white rounded-4 shadow p-4">

                        <i class="bi bi-people-fill display-5 mb-3" style="color:#008186;"></i>

                        <h2 class="fw-bold">

                            2500+

                        </h2>

                        <p class="text-muted mb-0">

                            Readers

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="bg-white rounded-4 shadow p-4">

                        <i class="bi bi-pencil-square display-5 mb-3" style="color:#008186;"></i>

                        <h2 class="fw-bold">

                            500+

                        </h2>

                        <p class="text-muted mb-0">

                            Authors

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="bg-white rounded-4 shadow p-4">

                        <i class="bi bi-star-fill display-5 mb-3" style="color:#008186;"></i>

                        <h2 class="fw-bold">

                            4.9★

                        </h2>

                        <p class="text-muted mb-0">

                            Average Rating

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ======================================= -->
    <!--           ALL BOOKS SECTION             -->
    <!-- ======================================= -->

    <section class="py-5" id="allBooks">

        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-5">

                <div>



                    <h2 class="fw-bold display-5 mt-3">

                        Explore Our Books

                    </h2>

                    <p class="text-muted">

                        Browse our complete collection of books.

                    </p>

                </div>



            </div>

            <div class="row g-4">

                @forelse($books as $book)
                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="card border-0 shadow rounded-4 overflow-hidden h-100">

                            <!-- Image -->
                            <div class="position-relative bg-light p-3 text-center">


                                <img src="{{ asset('uploads/books/' . $book->image) }}" class="img-fluid"
                                    style="height:260px;object-fit:contain;transition:.3s;">

                            </div>

                            <!-- Body -->
                            <div class="card-body d-flex flex-column">

                                <small class="text-muted">

                                    {{ $book->category->name }}

                                </small>

                                <h5 class="fw-bold mt-2">

                                    {{ $book->title }}

                                </h5>

                                <p class="text-secondary mb-2">

                                    By {{ $book->author->name }}

                                </p>

                                <div class="mb-3 text-warning">

                                    ★★★★★

                                </div>

                                <div class="mb-4">

                                    @if ($book->discount_price)
                                        <span class="fs-5 fw-bold text-success">

                                            Rs {{ number_format($book->discount_price) }}

                                        </span>

                                        <br>

                                        <small class="text-decoration-line-through text-muted">

                                            Rs {{ number_format($book->price) }}

                                        </small>
                                    @else
                                        <span class="fs-5 fw-bold text-success">

                                            Rs {{ number_format($book->price) }}

                                        </span>
                                    @endif

                                </div>

                                <div class="mt-auto">

                                    <a href="{{ route('book.details', $book->slug) }}"
                                        class="btn btn-dark w-100 rounded-pill mb-2">

                                        <i class="bi bi-eye me-2"></i>

                                        View Details

                                    </a>

                                    <a href="{{ route('cart.add', $book->id) }}"
                                        class="btn btn-success w-100 rounded-pill">

                                        <i class="bi bi-cart-plus me-2"></i>

                                        Add To Cart

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">

                        <h3 class="text-muted">

                            No Books Available

                        </h3>

                    </div>
                @endforelse

            </div>




        </div>
        <div class="d-flex justify-content-center align-items-center gap-2 mt-5 mb-3">

            {{-- Previous --}}
            @if ($books->onFirstPage())
                <button
                    class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                    style="width:55px;height:55px;">

                    <i class="bi bi-chevron-left fs-5"></i>

                </button>
            @else
                <a href="{{ $books->previousPageUrl() }}"
                    class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                    style="width:55px;height:55px;">

                    <i class="bi bi-chevron-left fs-5"></i>

                </a>
            @endif


            {{-- Page Numbers --}}
            @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                <a href="{{ $url }}"
                    class="btn {{ $page == $books->currentPage() ? 'btn-dark shadow-lg' : 'btn-light shadow-sm border' }}
                   rounded-4 fw-bold d-flex justify-content-center align-items-center"
                    style="width:52px;height:52px;">

                    {{ $page }}

                </a>
            @endforeach


            {{-- Next --}}
            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}"
                    class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                    style="width:55px;height:55px;">

                    <i class="bi bi-chevron-right fs-5"></i>

                </a>
            @else
                <button
                    class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                    style="width:55px;height:55px;">

                    <i class="bi bi-chevron-right fs-5"></i>

                </button>
            @endif

        </div>
        <div class="text-center">

            <div class="d-flex align-items-center justify-content-center">

                <hr class="w-25">

                <i class="bi bi-book mx-3 fs-2 text-warning"></i>

                <hr class="w-25">

            </div>


        </div>

    </section>



    <!-- ======================================= -->
    <!--          WHY CHOOSE US SECTION          -->
    <!-- ======================================= -->

    <section class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">



                <h2 class="display-5 fw-bold mt-3">

                    More Than Just A Book Store

                </h2>

                <p class="text-muted">

                    We provide a premium digital reading experience for every reader.

                </p>

            </div>

            <div class="row g-4">

                <div class="col-lg-3 col-md-6">

                    <div class="card border-0 shadow rounded-5 text-center h-100 p-4">

                        <div class="mx-auto mb-4 d-flex justify-content-center align-items-center rounded-circle"
                            style="width:80px;height:80px;background:#008186;">

                            <i class="bi bi-book-half fs-1 text-white"></i>

                        </div>

                        <h4 class="fw-bold">

                            Thousands Of Books

                        </h4>

                        <p class="text-muted">

                            Explore books from multiple categories with one click.

                        </p>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="card border-0 shadow rounded-5 text-center h-100 p-4">

                        <div class="mx-auto mb-4 d-flex justify-content-center align-items-center rounded-circle"
                            style="width:80px;height:80px;background:#008186;">

                            <i class="bi bi-lightning-charge-fill fs-1 text-white"></i>

                        </div>

                        <h4 class="fw-bold">

                            Fast Access

                        </h4>

                        <p class="text-muted">

                            Find your favorite books quickly with our smart system.

                        </p>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="card border-0 shadow rounded-5 text-center h-100 p-4">

                        <div class="mx-auto mb-4 d-flex justify-content-center align-items-center rounded-circle"
                            style="width:80px;height:80px;background:#008186;">

                            <i class="bi bi-shield-check fs-1 text-white"></i>

                        </div>

                        <h4 class="fw-bold">

                            Trusted Platform

                        </h4>

                        <p class="text-muted">

                            Safe, reliable and easy-to-use online book platform.

                        </p>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="card border-0 shadow rounded-5 text-center h-100 p-4">

                        <div class="mx-auto mb-4 d-flex justify-content-center align-items-center rounded-circle"
                            style="width:80px;height:80px;background:#008186;">

                            <i class="bi bi-award-fill fs-1 text-white"></i>

                        </div>

                        <h4 class="fw-bold">

                            Quality Collection

                        </h4>

                        <p class="text-muted">

                            Hand-picked books for students, professionals and readers.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- ======================================= -->
    <!--        CALL TO ACTION SECTION           -->
    <!-- ======================================= -->

    <section class="py-5">

        <div class="container">

            <div class="rounded-5 text-center text-white p-5 shadow-lg"
                style="background:linear-gradient(135deg,#008186,#00a3a8);">

                <h2 class="display-5 fw-bold">

                    Your Next Great Book Is Waiting

                </h2>

                <p class="lead mt-3 mb-4">

                    Discover inspiring stories, best-selling books and educational resources all in one place.

                </p>

                <a href="#allBooks" class="btn btn-warning btn-lg rounded-pill px-5">

                    Browse All Books

                </a>

            </div>

        </div>

    </section>

    <!-- ========================================= -->
    <!--         READER TESTIMONIALS               -->
    <!-- ========================================= -->

    <section class="py-5 bg-white">

        <div class="container">

            <div class="text-center mb-5">


                <h2 class="display-5 fw-bold mt-3">
                    What Our Readers Say
                </h2>

                <p class="text-muted">
                    Thousands of readers trust our digital library every day.
                </p>

            </div>

            <div class="row g-4">

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 p-4 h-100">

                        <div class="text-warning fs-5 mb-3">
                            ★★★★★
                        </div>

                        <p class="text-muted">
                            "This website has completely changed my reading habits.
                            Finding books is easy and the interface is beautiful."
                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle text-white d-flex justify-content-center align-items-center fw-bold"
                                style="width:60px;height:60px;background:#008186;">

                                A

                            </div>

                            <div class="ms-3">

                                <h6 class="mb-0 fw-bold">
                                    Ali Raza
                                </h6>

                                <small class="text-muted">
                                    Student
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 p-4 h-100">

                        <div class="text-warning fs-5 mb-3">
                            ★★★★★
                        </div>

                        <p class="text-muted">
                            "Excellent collection of books with amazing discounts.
                            Highly recommended for every book lover."
                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle text-white d-flex justify-content-center align-items-center fw-bold"
                                style="width:60px;height:60px;background:#008186;">

                                S

                            </div>

                            <div class="ms-3">

                                <h6 class="mb-0 fw-bold">
                                    Sara Khan
                                </h6>

                                <small class="text-muted">
                                    Teacher
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card border-0 shadow rounded-5 p-4 h-100">

                        <div class="text-warning fs-5 mb-3">
                            ★★★★★
                        </div>

                        <p class="text-muted">
                            "The design is premium and browsing books is very smooth.
                            My favorite online library."
                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle text-white d-flex justify-content-center align-items-center fw-bold"
                                style="width:60px;height:60px;background:#008186;">

                                M

                            </div>

                            <div class="ms-3">

                                <h6 class="mb-0 fw-bold">
                                    Muhammad Ahmed
                                </h6>

                                <small class="text-muted">
                                    Reader
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
