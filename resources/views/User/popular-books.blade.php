 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
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
 </style>

 <body>
     @extends('Layouts.Userslayouts')

     @section('content')
         <!-- Hero Section -->
         <section class="py-5 " style="background:#008186;">

             <div class="container">

                 <div class="row align-items-center gy-5">

                     <!-- Left Side -->
                     <div class="col-lg-6">


                         <h1 class="display-3 fw-bold text-white mb-4">

                             Discover The

                             <span style="color:#F4B400;">

                                 Most Popular

                             </span>

                             <br>

                             Books Collection

                         </h1>

                         <p class=" text-white fs-5 mb-4">

                             Discover our most loved books carefully selected by thousands
                             of readers. Explore best-selling novels, educational books,
                             programming guides, and inspiring stories all in one place.

                         </p>



                         <div class="row text-center mt-5">

                             <div class="col-4">

                                 <h2 class="fw-bold text-white">
                                     {{ $popularBooks->total() }}
                                 </h2>

                                 <small class="text-white">
                                     Popular Books
                                 </small>

                             </div>

                             <div class="col-4">

                                 <h2 class="fw-bold text-white">
                                     100%
                                 </h2>

                                 <small class="text-white">
                                     Original PDF
                                 </small>

                             </div>

                             <div class="col-4">

                                 <h2 class="fw-bold text-white">
                                     24/7
                                 </h2>

                                 <small class="text-white">
                                     Support
                                 </small>

                             </div>

                         </div>

                     </div>

                     <!-- Right Side -->

                     <div class="col-lg-6 text-center">

                         <img src="{{ asset('images/books.png') }}" class="img-fluid" style="max-height:500px;">

                     </div>
                 </div>

             </div>

         </section>

         <section class="" style="background:#F5EFE6;">


             <div class="bg-white  shadow-lg p-4">

                 <div class="row align-items-center gy-3">

                     <!-- Left -->

                     <div class="col-lg-4">

                         <h3 class="fw-bold mb-1">

                             Find Your Next

                         </h3>

                         <h2 class="fw-bold" style="color:#008186;">

                             Most Popular books

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
         <!-- Popular Books -->
         <section class="py-5" style="background:#F5EFE6;">

             <div class="container">
                 <div class="text-center mb-5">

                     <span class="badge px-4 py-2 rounded-pill text-white" style="background:#008186;">

                         Most Popular
                         Books

                     </span>

                     <h2 class="fw-bold mt-3">

                         Explore Our Most Popular
                         Books

                     </h2>

                     <p class="text-muted">

                         Discover the books that readers love the most.

                     </p>

                 </div>


                 <div class="row g-4  ">

                     @forelse ($popularBooks as $book)
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
                                 No Popular Books Found.
                             </h4>

                         </div>
                     @endforelse

                 </div>


             </div>


             <div class="d-flex justify-content-center align-items-center gap-2 mt-3 mb-3">

                 {{-- Previous --}}
                 @if ($popularBooks->onFirstPage())
                     <button
                         class="btn btn-light rounded-circle shadow border disabled d-flex justify-content-center align-items-center"
                         style="width:55px;height:55px;">

                         <i class="bi bi-chevron-left fs-5"></i>

                     </button>
                 @else
                     <a href="{{ $popularBooks->previousPageUrl() }}"
                         class="btn btn-light rounded-circle shadow border d-flex justify-content-center align-items-center"
                         style="width:55px;height:55px;">

                         <i class="bi bi-chevron-left fs-5"></i>

                     </a>
                 @endif


                 {{-- Page Numbers --}}
                 @foreach ($popularBooks->getUrlRange(1, $popularBooks->lastPage()) as $page => $url)
                     <a href="{{ $url }}"
                         class="btn {{ $page == $popularBooks->currentPage() ? 'btn-dark shadow-lg' : 'btn-light shadow-sm border' }}
                           rounded-4 fw-bold d-flex justify-content-center align-items-center"
                         style="width:52px;height:52px;">

                         {{ $page }}

                     </a>
                 @endforeach


                 {{-- Next --}}
                 @if ($popularBooks->hasMorePages())
                     <a href="{{ $popularBooks->nextPageUrl() }}"
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

         <!-- Why Choose Us -->
     @endsection

 </body>

 </html>
