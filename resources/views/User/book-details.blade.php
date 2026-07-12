<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('Layouts.Userslayouts')


    @section('content')
        @php
            use Illuminate\Support\Str;
        @endphp
        {{-- Part 1 yahan se start hoga --}}
        <!-- ========================================= -->
        <!-- Book Details Hero Section -->
        <!-- ========================================= -->

        <section class="py-5 text-white" style="background:#008186;">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <span class="badge bg-light text-dark rounded-pill px-3 py-2 mb-3">

                            📚 BOOK DETAILS

                        </span>

                        <h1 class="fw-bold display-5 mb-3">

                            {{ $book->title }}

                        </h1>

                        <p class="mb-4 text-white-50">

                            Discover every detail about this amazing book before
                            adding it to your collection.

                        </p>

                        <nav>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item">

                                    <a href="{{ url('/') }}" class="text-white text-decoration-none">

                                        Home

                                    </a>

                                </li>

                                <li class="breadcrumb-item">

                                    <a href="{{ route('popular.books') }}" class="text-white text-decoration-none">

                                        Books

                                    </a>

                                </li>

                                <li class="breadcrumb-item active text-warning">

                                    {{ $book->title }}

                                </li>

                            </ol>

                        </nav>

                    </div>

                    <div class="col-lg-4 text-center mt-4 mt-lg-0">

                        <i class="bi bi-book-half" style="font-size:140px;color:rgba(255,255,255,.25);">

                        </i>

                    </div>

                </div>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- Book Main Details -->
        <!-- ========================================= -->

        <section class="py-5" style="background:#F8F9FA;">

            <div class="container">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="row g-0">

                        <!-- Book Image -->

                        <div class="col-lg-4">

                            <div class="h-100 d-flex align-items-center justify-content-center p-5 bg-white">

                                <img src="{{ asset('uploads/books/' . $book->image) }}" class="img-fluid rounded-4 shadow"
                                    style="max-height:500px;">

                            </div>

                        </div>

                        <!-- Book Details -->

                        <div class="col-lg-8">

                            <div class="card-body p-5">

                                <!-- Category -->

                                <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#008186;">

                                    {{ $book->category->name }}

                                </span>

                                <!-- Title -->

                                <h2 class="fw-bold mb-3">

                                    {{ $book->title }}

                                </h2>

                                <!-- Author -->

                                <h5 class="text-secondary mb-4">

                                    By

                                    <span class="fw-bold">

                                        {{ $book->author->name }}

                                    </span>

                                </h5>

                                <!-- Price -->

                                <div class="mb-4">

                                    @if ($book->discount_price)
                                        <span class="fs-2 fw-bold text-success">

                                            Rs {{ number_format($book->discount_price) }}

                                        </span>

                                        <span class="fs-5 text-decoration-line-through text-muted ms-3">

                                            Rs {{ number_format($book->price) }}

                                        </span>
                                    @else
                                        <span class="fs-2 fw-bold text-success">

                                            Rs {{ number_format($book->price) }}

                                        </span>
                                    @endif

                                </div>

                                <!-- Stock -->

                                @if ($book->stock > 0)
                                    <span class="badge bg-success px-3 py-2 mb-4">

                                        In Stock ({{ $book->stock }} Available)

                                    </span>
                                @else
                                    <span class="badge bg-danger px-3 py-2 mb-4">

                                        Out Of Stock

                                    </span>
                                @endif

                                <!-- Short Description -->

                                <p class="text-muted lh-lg">

                                    {{ Str::limit($book->description, 220) }}

                                </p>

                                <!-- Buttons -->

                                <div class="d-flex flex-wrap gap-3 mt-4">

                                    <a href="{{ route('cart.add', $book->id) }}" class="btn text-white px-5 py-3 rounded-pill fw-bold"
                                        style="background:#008186;">

                                        <i class="bi bi-cart-plus me-2"></i>

                                        Add To Cart

                                    </a>

                                    <a href="{{ asset('uploads/pdfs/' . $book->pdf) }}" target="_blank"
                                        class="btn btn-dark px-5 py-3 rounded-pill fw-bold">

                                        <i class="bi bi-file-earmark-pdf me-2"></i>

                                        Read Book

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- ========================================= -->
        <!-- Book Description & Information -->
        <!-- ========================================= -->

        <section class="py-5 " style="background:#F5F7FA;">

            <div class="container ">

                <div class="row g-4">


                    <!-- Description -->

                    <div class="col-lg-8">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-header border-0 py-4" style="background:#008186;">

                                <h3 class="text-white fw-bold mb-0">

                                    <i class="bi bi-book me-2"></i>

                                    Book Description

                                </h3>

                            </div>

                            <div class="card-body p-4">

                                <p class="text-muted lh-lg mb-0">

                                    {{ $book->description }}

                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Book Information -->

                    <div class="col-lg-4">

                        <div class="card border-0 shadow-sm rounded-4">

                            <div class="card-header border-0 py-4" style="background:#008186;">

                                <h3 class="text-white fw-bold mb-0">

                                    <i class="bi bi-info-circle me-2"></i>

                                    Book Information

                                </h3>

                            </div>

                            <div class="card-body p-0">

                                <table class="table mb-0">

                                    <tbody>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Category

                                            </th>

                                            <td class="py-3">

                                                {{ $book->category->name }}

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Author

                                            </th>

                                            <td class="py-3">

                                                {{ $book->author->name }}

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Price

                                            </th>

                                            <td class="py-3 text-success fw-bold">

                                                Rs {{ number_format($book->price) }}

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Discount

                                            </th>

                                            <td class="py-3">

                                                @if ($book->discount_price)
                                                    Rs {{ number_format($book->discount_price) }}
                                                @else
                                                    —
                                                @endif

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Stock

                                            </th>

                                            <td class="py-3">

                                                @if ($book->stock > 0)
                                                    <span class="badge bg-success">

                                                        {{ $book->stock }} Available

                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">

                                                        Out Of Stock

                                                    </span>
                                                @endif

                                            </td>

                                        </tr>

                                        <tr>

                                            <th class="ps-4 py-3">

                                                Status

                                            </th>

                                            <td class="py-3">

                                                @if ($book->status)
                                                    <span class="badge bg-success">

                                                        Active

                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">

                                                        Inactive

                                                    </span>
                                                @endif

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- ========================================= -->
        <!-- Related Books -->
        <!-- ========================================= -->

        <section class="py-5" style="background:#ffffff;">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="badge px-4 py-2 rounded-pill text-white" style="background:#008186;">

                        YOU MAY ALSO LIKE

                    </span>

                    <h2 class="fw-bold mt-3">

                        Related Books

                    </h2>

                    <p class="text-muted">

                        Explore more books from the same category.

                    </p>

                </div>

                <div class="row">

                    @forelse($relatedBooks as $related)
                        <div class="col-lg-3 col-md-6 mb-4">

                            <div class="card border-0 shadow-sm rounded-4 h-100">

                                <div class="bg-light text-center p-4">

                                    <img src="{{ asset('uploads/books/' . $related->image) }}" class="img-fluid"
                                        style="height:220px;object-fit:contain;">

                                </div>

                                <div class="card-body text-center">

                                    <small class="text-muted">

                                        {{ $related->category->name }}

                                    </small>

                                    <h5 class="fw-bold mt-2">

                                        {{ $related->title }}

                                    </h5>

                                    <p class="text-secondary mb-3">

                                        {{ $related->author->name }}

                                    </p>

                                    <h5 class="text-success fw-bold mb-4">

                                        Rs {{ number_format($related->discount_price ?? $related->price) }}

                                    </h5>

                                    <a href="{{ route('book.details', $related->slug) }}"
                                        class="btn text-white rounded-pill w-100" style="background:#008186;">

                                        View Details

                                    </a>

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="col-12 text-center">

                            <h5 class="text-muted">

                                No Related Books Found.

                            </h5>

                        </div>
                    @endforelse

                </div>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- Readers Reviews -->
        <!-- ========================================= -->

        <section class="py-5" style="background:#F5F7FA;">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="badge px-4 py-2 rounded-pill text-white" style="background:#008186;">

                        READER REVIEWS

                    </span>

                    <h2 class="fw-bold mt-3">

                        What Our Readers Say

                    </h2>

                    <p class="text-muted">

                        Honest opinions from our happy readers.

                    </p>

                </div>

                <div class="row">

                    <!-- Review 1 -->

                    <div class="col-lg-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-body p-4">

                                <div class="mb-3 text-warning fs-5">

                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>

                                </div>

                                <p class="text-muted">

                                    This book exceeded my expectations. The content is
                                    easy to understand and very informative.

                                </p>

                                <hr>

                                <h6 class="fw-bold mb-0">

                                    Ahmed Khan

                                </h6>

                                <small class="text-secondary">

                                    Verified Reader

                                </small>

                            </div>

                        </div>

                    </div>

                    <!-- Review 2 -->

                    <div class="col-lg-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-body p-4">

                                <div class="mb-3 text-warning fs-5">

                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>

                                </div>

                                <p class="text-muted">

                                    Beautiful design, excellent writing and fast
                                    delivery. Highly recommended.

                                </p>

                                <hr>

                                <h6 class="fw-bold mb-0">

                                    Ali Raza

                                </h6>

                                <small class="text-secondary">

                                    Book Lover

                                </small>

                            </div>

                        </div>

                    </div>

                    <!-- Review 3 -->

                    <div class="col-lg-4 mb-4">

                        <div class="card border-0 shadow-sm rounded-4 h-100">

                            <div class="card-body p-4">

                                <div class="mb-3 text-warning fs-5">

                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>

                                </div>

                                <p class="text-muted">

                                    One of the best books I've read this year.
                                    Definitely worth buying.

                                </p>

                                <hr>

                                <h6 class="fw-bold mb-0">

                                    Sara Ahmed

                                </h6>

                                <small class="text-secondary">

                                    Premium Member

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- ========================================= -->
        <!-- Frequently Asked Questions -->
        <!-- ========================================= -->

        <section class="py-5 bg-white">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="badge px-4 py-2 rounded-pill text-white" style="background:#008186;">

                        FAQ

                    </span>

                    <h2 class="fw-bold mt-3">

                        Frequently Asked Questions

                    </h2>

                    <p class="text-muted">

                        Find answers to the most common questions about this book.

                    </p>

                </div>

                <div class="accordion shadow rounded-4 overflow-hidden" id="bookFAQ">

                    <!-- FAQ 1 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">

                                Is this book available in PDF format?

                            </button>

                        </h2>

                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Yes. If the publisher provides a PDF version, you can
                                read or download it directly from this page.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 2 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">

                                Can I purchase this book online?

                            </button>

                        </h2>

                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Yes. Simply click the Add to Cart button and complete
                                the checkout process.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 3 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">

                                Is this book suitable for beginners?

                            </button>

                        </h2>

                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Yes. The content is written in a simple and easy-to-read
                                format suitable for beginners.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 4 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">

                                Is Cash on Delivery available?

                            </button>

                        </h2>

                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Yes. Cash on Delivery is available in selected cities.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 5 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5">

                                How long does delivery take?

                            </button>

                        </h2>

                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Standard delivery usually takes 3–5 business days,
                                depending on your location.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 6 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq6">

                                Can I return or exchange this book?

                            </button>

                        </h2>

                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Yes. Books can be exchanged within 7 days if they are
                                damaged or incorrectly delivered.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 7 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq7">

                                Is my online payment secure?

                            </button>

                        </h2>

                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                Absolutely. We use secure payment gateways to keep your
                                personal and payment information protected.

                            </div>

                        </div>

                    </div>

                    <!-- FAQ 8 -->

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq8">

                                How can I contact customer support?

                            </button>

                        </h2>

                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#bookFAQ">

                            <div class="accordion-body">

                                You can contact our support team through the Contact Us
                                page or email us anytime. We're happy to help.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    @endsection
</body>

</html>
