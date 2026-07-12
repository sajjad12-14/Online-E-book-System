 @extends('Layouts.Userslayouts')

 @section('content')
     <style>
         .btn-light {
             border: 1px solid #e5e5e5;
             transition: .3s;
         }

         .btn-light:hover {

             background: #212529;
             color: #fff;
             transform: translateY(-3px);

         }

         .btn-dark {

             transform: translateY(-3px);
             box-shadow: 0 10px 20px rgba(0, 0, 0, .15);

         }

         .book-card {

             transition: .35s;

         }

         .book-card:hover {

             transform: translateY(-10px);
             box-shadow: 0 18px 40px rgba(0, 0, 0, .12);

         }
     </style>

     <!-- Hero -->

     <section class="py-5 text-white" style="background:#008186;">

         <div class="container">

             <div class="row align-items-center gy-5">

                 <div class="col-lg-6">

                     <h1 class="display-4 fw-bold mb-4">

                         Discover Our

                         <span style="color:#F4B400;">

                             Featured

                         </span>

                         Books Collection

                     </h1>

                     <p class="fs-5">

                         Discover hand-picked books specially selected for our readers.
                         Explore programming books, novels, educational books,
                         business books and much more.

                     </p>

                     <div class="row text-center mt-5">

                         <div class="col-4">

                             <h2 class="fw-bold">

                                 {{ $featuredBooks->total() }}

                             </h2>

                             <small>

                                 Featured Books

                             </small>

                         </div>

                         <div class="col-4">

                             <h2 class="fw-bold">

                                 100%

                             </h2>

                             <small>

                                 Original Books

                             </small>

                         </div>

                         <div class="col-4">

                             <h2 class="fw-bold">

                                 24/7

                             </h2>

                             <small>

                                 Support

                             </small>

                         </div>

                     </div>

                 </div>

                 <div class="col-lg-6 text-center">

                     <img src="{{ asset('images/books.png') }}" class="img-fluid" style="max-height:500px;">

                 </div>

             </div>

         </div>

     </section>





     <!-- Search -->

     <section style="background:#F5EFE6;">

         <div class="container">

             <div class="bg-white rounded-4 shadow p-4">

                 <div class="row align-items-center gy-3">

                     <div class="col-lg-4">

                         <h3 class="fw-bold">

                             Find Your Next

                         </h3>

                         <h2 class="fw-bold" style="color:#008186;">

                             Featured Book

                         </h2>

                         <small class="text-muted">

                             Search books by title or category.

                         </small>

                     </div>



                     <div class="col-lg-5">

                         <div class="input-group input-group-lg">

                             <span class="input-group-text bg-white border-end-0 rounded-start-pill">

                                 <i class="bi bi-search"></i>

                             </span>

                             <input type="text" class="form-control border-start-0 border-end-0 shadow-none"
                                 placeholder="Search Featured Books...">

                             <button class="btn text-white rounded-end-pill px-4" style="background:#008186;">

                                 Search

                             </button>

                         </div>

                     </div>

                     <div class="col-lg-3">

                         <select class="form-select form-select-lg rounded-pill">

                             <option>

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





     <!-- Featured Books -->

     <section class="py-5" style="background:#F5EFE6;">

         <div class="container">

             <div class="text-center mb-5">

                 <span class="badge rounded-pill px-4 py-2 text-white" style="background:#008186;">

                     Featured Books

                 </span>

                 <h2 class="fw-bold mt-3">

                     Explore Featured Books

                 </h2>

                 <p class="text-muted">

                     Browse our hand-picked featured collection.

                 </p>

             </div>

             <div class="row g-4">

                 @forelse($featuredBooks as $book)
                     <div class="col-lg-3 col-md-6">

                         <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden book-card">

                             <div class="bg-light p-4 text-center">

                                 <img src="{{ asset('uploads/books/' . $book->image) }}" class="img-fluid"
                                     style="height:230px;object-fit:contain;">

                             </div>

                             <div class="card-body text-center">

                                 <span class="badge rounded-pill" style="background:#E8F5E9;color:#008186;">

                                     {{ $book->category->name }}

                                 </span>

                                 <h5 class="fw-bold mt-3">

                                     {{ $book->title }}

                                 </h5>

                                 <p class="text-muted mb-2">

                                     By {{ $book->author->name }}

                                 </p>

                                 <h5 class="text-success fw-bold mb-3">

                                     Rs {{ number_format($book->discount_price ?? $book->price) }}

                                 </h5>

                                 <a href="{{ route('book.details', $book->slug) }}"
                                     class="btn btn-dark rounded-pill w-100 mb-2">

                                     View Details

                                 </a>

                                 <a href="{{ route('cart.add', $book->id) }}"
                                     class="btn btn-outline-success rounded-pill w-100">

                                     <i class="bi bi-cart-plus me-2"></i>

                                     Add To Cart

                                 </a>

                             </div>

                         </div>

                     </div>

                 @empty

                     <div class="col-12 text-center py-5">

                         <h3 class="text-muted">

                             No Featured Books Found

                         </h3>

                     </div>
                 @endforelse

             </div>
             <!-- Pagination -->

             <div class="d-flex justify-content-center align-items-center gap-2 mt-5">

                 {{-- Previous --}}

                 @if ($featuredBooks->onFirstPage())
                     <button
                         class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                         style="width:55px;height:55px;">

                         <i class="bi bi-chevron-left fs-5"></i>

                     </button>
                 @else
                     <a href="{{ $featuredBooks->previousPageUrl() }}"
                         class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                         style="width:55px;height:55px;">

                         <i class="bi bi-chevron-left fs-5"></i>

                     </a>
                 @endif



                 {{-- Page Numbers --}}

                 @foreach ($featuredBooks->getUrlRange(1, $featuredBooks->lastPage()) as $page => $url)
                     <a href="{{ $url }}"
                         class="btn {{ $page == $featuredBooks->currentPage() ? 'btn-dark shadow-lg' : 'btn-light shadow-sm border' }}
                        rounded-4 fw-bold d-flex justify-content-center align-items-center"
                         style="width:52px;height:52px;">

                         {{ $page }}

                     </a>
                 @endforeach




                 {{-- Next --}}

                 @if ($featuredBooks->hasMorePages())
                     <a href="{{ $featuredBooks->nextPageUrl() }}"
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

             <div class="text-center mt-5">

                 <div class="d-flex justify-content-center align-items-center">

                     <hr class="w-25">

                     <i class="bi bi-book-half fs-2 mx-3 text-warning"></i>

                     <hr class="w-25">

                 </div>

                 <p class="text-muted mt-3">

                     Keep Reading • Keep Learning • Keep Growing

                 </p>

             </div>

         </div>

     </section>
 @endsection
