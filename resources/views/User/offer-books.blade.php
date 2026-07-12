    @extends('Layouts.Userslayouts')

    @section('content')
        <section class="py-5" style="background:#008186;">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-8">



                        <h1 class="display-3 fw-bold mb-4 text-white">

                            Get <span class="text-danger">50% OFF</span><br>

                            On Your First Book Order!

                        </h1>

                        <p class="text-white fs-5">

                            Welcome to our online bookstore. As a first-time customer,
                            enjoy an exclusive 50% discount on your first purchase.
                            Browse our collection and choose your favorite book today.

                        </p>

                    </div>

                    <div class="col-lg-4 text-center">

                        <img src="{{ asset('images/books.png') }}" class="img-fluid" style="max-height:350px;">

                    </div>

                </div>

            </div>

        </section>



        <section class="py-5" style="background:#F5EFE6">

            <div class="container">

                <div class="row">

                    @foreach ($offerBooks as $book)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 rounded-4">

                                <!-- Discount Badge -->
                                <div class="position-absolute top-0 start-0 m-3">

                                    <span class="badge bg-danger px-3 py-2">
                                        50% OFF
                                    </span>

                                </div>

                                <!-- Book Image -->
                                <div class="text-center p-3 bg-light">

                                    <img src="{{ asset('uploads/books/' . $book->image) }}" class="img-fluid rounded-4"
                                        style="height:220px; object-fit:contain;">

                                </div>

                                <!-- Card Body -->
                                <div class="card-body text-center">

                                    <small class="text-muted">

                                        {{ $book->category->name ?? '' }}

                                    </small>

                                    <h5 class="fw-bold mt-2">

                                        {{ $book->title }}

                                    </h5>

                                    <small class="text-secondary">

                                        By {{ $book->author->name ?? '' }}

                                    </small>

                                    <div class="mt-3">

                                        <del class="text-muted">

                                            Rs {{ number_format($book->price) }}

                                        </del>

                                        <h4 class="text-danger fw-bold mt-2">

                                            Rs {{ number_format($book->price / 2) }}

                                        </h4>

                                    </div>

                                    <a href="{{ route('book.details', $book->slug) }}"
                                        class="btn btn-dark w-100 rounded-pill mt-3">

                                        View Details

                                    </a>

                                    <a href="{{ route('cart.add', $book->id) }}"
                                        class="btn btn-outline-success w-100 rounded-pill mt-2">

                                        <i class="bi bi-cart-plus"></i>

                                        Add To Cart

                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach
                    @if ($offerBooks->count() == 0)
                        <div class="col-12">

                            <div class="alert alert-warning text-center rounded-4">

                                <h4 class="mb-2">

                                    No Books Available

                                </h4>

                                <p class="mb-0">

                                    Sorry! No books are available for this offer at the moment.

                                </p>

                            </div>

                        </div>
                    @endif

                </div>

                <div class="d-flex justify-content-center align-items-center gap-2 mt-3 mb-3">

                    {{-- Previous --}}

                    @if ($offerBooks->onFirstPage())
                        <button
                            class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                            style="width:55px;height:55px;">

                            <i class="bi bi-chevron-left fs-5"></i>

                        </button>
                    @else
                        <a href="{{ $offerBooks->previousPageUrl() }}"
                            class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                            style="width:55px;height:55px;">

                            <i class="bi bi-chevron-left fs-5"></i>

                        </a>
                    @endif



                    {{-- Pages --}}

                    @foreach ($offerBooks->getUrlRange(1, $offerBooks->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="btn {{ $page == $offerBooks->currentPage() ? 'btn-dark shadow-lg' : 'btn-light shadow-sm border' }}
            rounded-4 fw-bold d-flex justify-content-center align-items-center"
                            style="width:52px;height:52px;">

                            {{ $page }}

                        </a>
                    @endforeach



                    {{-- Next --}}

                    @if ($offerBooks->hasMorePages())
                        <a href="{{ $offerBooks->nextPageUrl() }}"
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
    @endsection

    </div>
