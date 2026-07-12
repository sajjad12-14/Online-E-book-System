    @extends('Layouts.Userslayouts')




    @section('content')
        <!-- ========================= -->
        <!-- Hero Section -->
        <!-- ========================= -->

        <section class="py-5 overflow-hidden" style="background:#008186;">

            <div class="container py-5">

                <div class="row align-items-center">

                    <!-- Left Content -->

                    <div class="col-lg-6">


                        <h1 class="display-3 fw-bold text-white mb-4">

                            Discover The

                            <span style="color:#F4B400;">

                                Best Selling

                            </span>

                            <br>

                            Books Collection

                        </h1>

                        <p class="text-white opacity-75 fs-5 mb-5">

                            Explore the books readers love the most. Discover bestselling
                            novels, comics, story books, journals, general knowledge books,
                            quiz books and much more—all in one place.

                        </p>

                        <div class="d-flex flex-wrap gap-3 mb-5">

                            <a href="#books" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">

                                <i class="bi bi-book-half me-2"></i>

                                Explore Books

                            </a>



                        </div>



                    </div>

                    <!-- Right Image -->

                    <div class="col-lg-6 text-center">

                        <img src="{{ asset('Frontend/images/books.png') }}" class="img-fluid" style="max-height:560px;">

                    </div>

                </div>

            </div>

        </section>


        <!-- ========================= -->
        <!-- Premium Search Section -->
        <!-- ========================= -->

        <section class="" style="background:#F5EFE6;">


            <div class="bg-white  shadow-lg p-4">

                <div class="row align-items-center gy-3">

                    <!-- Left -->

                    <div class="col-lg-4">

                        <h3 class="fw-bold mb-1">

                            Find Your Next

                        </h3>

                        <h2 class="fw-bold" style="color:#008186;">

                            Best Selleing books

                        </h2>

                        <small class="text-muted">

                            Search books by title or category.

                        </small>

                    </div>

                    <!-- Search -->

                    <div class="col-lg-5">

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-white border-end-0 rounded-start-pill">

                                <i class="bi bi-search fs-5 text-secondary"></i>

                            </span>

                            <input type="text" class="form-control border-start-0 border-end-0 shadow-none"
                                placeholder="Search best selling books...">

                            <button class="btn text-white rounded-end-pill px-4" style="background:#008186;">

                                Search

                            </button>

                        </div>

                    </div>

                    <!-- Category -->

                    <div class="col-lg-3">

                        <select class="form-select form-select-lg rounded-pill shadow-none">

                            <option selected>

                                All Categories

                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                </div>

            </div>

            </div>

        </section>


        <!-- ========================= -->
        <!-- Best Selling Books -->
        <!-- ========================= -->

        <section class="py-5" style="background:#F5EFE6;">

            <div class="container">

                <!-- Heading -->

                <div class="text-center mb-5">

                    <span class="badge px-4 py-2 rounded-pill text-white" style="background:#008186;">

                        BEST SELLING BOOKS

                    </span>

                    <h2 class="fw-bold mt-3">

                        Explore Our Best Selling Books

                    </h2>

                    <p class="text-muted">

                        Discover the books that readers love the most.

                    </p>

                </div>

                <div class="row g-4">

                    @forelse ($bestSellingBooks as $book)
                        <div class="col-lg-3 col-md-6 mb-4">

                            <div class="card border-0 shadow-sm h-100">

                                <!-- Image -->

                                <div class="text-center p-3 bg-light">

                                    <img src="{{ asset('uploads/books/' . $book->image) }}" class="img-fluid"
                                        style="height:220px; object-fit:contain;">

                                </div>

                                <!-- Body -->

                                <div class="card-body text-center">

                                    <small class="text-muted">

                                        {{ $book->category->name }}

                                    </small>

                                    <h6 class="fw-bold mt-1">

                                        {{ $book->title }}

                                    </h6>

                                    <small class="text-secondary">

                                        By {{ $book->author->name }}

                                    </small>

                                    <div class="my-3">

                                        <span class="fw-bold text-success">

                                            Rs {{ $book->discount_price ?? $book->price }}

                                        </span>

                                    </div>

                                    <a href="{{ route('book.details', $book->slug) }}"
                                        class="btn btn-dark btn-sm w-100 mb-2 rounded-pill">
                                        View Details
                                    </a>

                                    <a href="{{ route('cart.add', $book->id) }}"
                                        class="btn btn-outline-success btn-sm w-100 rounded-pill">

                                        <i class="bi bi-cart-plus me-2"></i>

                                        Add To Cart

                                    </a>


                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12 text-center">

                            <h4 class="text-muted">

                                No Best Selling Books Found.

                            </h4>

                        </div>
                    @endforelse

                </div>

            </div>

            <!-- Pagination -->

            <div class="d-flex justify-content-center align-items-center gap-2 mt-3 mb-3">

                {{-- Previous --}}

                @if ($bestSellingBooks->onFirstPage())
                    <button
                        class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                        style="width:55px;height:55px;">

                        <i class="bi bi-chevron-left fs-5"></i>

                    </button>
                @else
                    <a href="{{ $bestSellingBooks->previousPageUrl() }}"
                        class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                        style="width:55px;height:55px;">

                        <i class="bi bi-chevron-left fs-5"></i>

                    </a>
                @endif

                {{-- Pages --}}

                @foreach ($bestSellingBooks->getUrlRange(1, $bestSellingBooks->lastPage()) as $page => $url)
                    <a href="{{ $url }}"
                        class="btn {{ $page == $bestSellingBooks->currentPage() ? 'btn-dark shadow-lg' : 'btn-light shadow-sm border' }}
                rounded-4 fw-bold d-flex justify-content-center align-items-center"
                        style="width:52px;height:52px;">

                        {{ $page }}

                    </a>
                @endforeach

                {{-- Next --}}

                @if ($bestSellingBooks->hasMorePages())
                    <a href="{{ $bestSellingBooks->nextPageUrl() }}"
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

            <!-- Bottom Decoration -->

            <div class="text-center">

                <div class="d-flex align-items-center justify-content-center">

                    <hr class="w-25">

                    <i class="bi bi-book-half mx-3 fs-2 text-warning"></i>

                    <hr class="w-25">

                </div>

            </div>

        </section>


        <!-- ====================================== -->
        <!-- Newsletter Section -->
        <!-- ====================================== -->

        <section class="py-5" style="background:#c5c5c5;">

            <div class="container">

                <div class="row align-items-center">

                    <!-- Left -->

                    <div class="col-lg-6">

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2 mb-3">

                            JOIN OUR COMMUNITY

                        </span>

                        <h2 class="fw-bold text-white mb-3">

                            Never Miss A Best Selling Book 📚

                        </h2>

                        <p class="text-white-50 mb-0">

                            Subscribe to our newsletter and be the first to know
                            about new arrivals, best selling books and exclusive
                            offers.

                        </p>

                    </div>

                    <!-- Right -->

                    <div class="col-lg-6 mt-4 mt-lg-0">

                        <div class="card border-0 shadow-lg rounded-4">

                            <div class="card-body p-4">

                                <div class="input-group input-group-lg">

                                    <span class="input-group-text bg-white border-end-0">

                                        <i class="bi bi-envelope-fill text-secondary"></i>

                                    </span>

                                    <input type="email" class="form-control border-start-0"
                                        placeholder="Enter your email">

                                    <button class="btn text-white px-4" style="background:#008186;">

                                        Subscribe

                                    </button>

                                </div>

                                <small class="text-muted d-block mt-3">

                                    We respect your privacy. No spam, ever.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- ===================================== -->
        <!-- Why Choose Us -->
        <!-- ===================================== -->

        <section class="py-5" style="background:#F8F9FA;">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="badge rounded-pill px-4 py-2 text-white" style="background:#008186;">

                        WHY CHOOSE US

                    </span>

                    <h2 class="fw-bold mt-3">

                        Experience The Best Book Store

                    </h2>

                    <p class="text-muted">

                        We provide quality books with trusted service and fast delivery.

                    </p>

                </div>

                <div class="row g-4">

                    <!-- Card 1 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                            <div class="mx-auto mb-3 rounded-circle d-flex justify-content-center align-items-center"
                                style="width:80px;height:80px;background:#008186;">

                                <i class="bi bi-truck fs-2 text-white"></i>

                            </div>

                            <h5 class="fw-bold">

                                Fast Delivery

                            </h5>

                            <p class="text-muted mb-0">

                                Quick and reliable delivery to your doorstep.

                            </p>

                        </div>

                    </div>

                    <!-- Card 2 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                            <div class="mx-auto mb-3 rounded-circle d-flex justify-content-center align-items-center"
                                style="width:80px;height:80px;background:#008186;">

                                <i class="bi bi-shield-check fs-2 text-white"></i>

                            </div>

                            <h5 class="fw-bold">

                                Secure Payment

                            </h5>

                            <p class="text-muted mb-0">

                                Safe and secure payment methods for every order.

                            </p>

                        </div>

                    </div>

                    <!-- Card 3 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                            <div class="mx-auto mb-3 rounded-circle d-flex justify-content-center align-items-center"
                                style="width:80px;height:80px;background:#008186;">

                                <i class="bi bi-book-half fs-2 text-white"></i>

                            </div>

                            <h5 class="fw-bold">

                                Original Books

                            </h5>

                            <p class="text-muted mb-0">

                                100% authentic books from trusted publishers.

                            </p>

                        </div>

                    </div>

                    <!-- Card 4 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                            <div class="mx-auto mb-3 rounded-circle d-flex justify-content-center align-items-center"
                                style="width:80px;height:80px;background:#008186;">

                                <i class="bi bi-headset fs-2 text-white"></i>

                            </div>

                            <h5 class="fw-bold">

                                24/7 Support

                            </h5>

                            <p class="text-muted mb-0">

                                Our support team is always ready to help you.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    @endsection
