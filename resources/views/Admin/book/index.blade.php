 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>

 <body>
     @extends('Layouts.Adminlayouts')

     @section('content')
         <div class="container-fluid">

             <!-- Page Heading -->

             <div class="d-flex justify-content-between align-items-center mb-4">

                 <div>

                     <h2 class="fw-bold mb-1">

                         <i class="bi bi-book-half text-primary me-2"></i>

                         Manage Books

                     </h2>

                     <small class="text-muted">

                         Manage all books from here.

                     </small>

                 </div>

                 <a href="{{ route('admin.books.create') }}" class="btn btn-success">

                     <i class="bi bi-plus-circle me-2"></i>

                     Add New Book

                 </a>

             </div>

             <!-- Statistics Cards -->

             <div class="row g-4 mb-4">

                 <div class="col-lg-4 col-md-6">

                     <div class="card border-0 shadow-sm bg-primary text-white">

                         <div class="card-body">

                             <div class="d-flex justify-content-between align-items-center">

                                 <div>

                                     <h6 class="mb-2">

                                         Total Books

                                     </h6>

                                     <h2 class="fw-bold">

                                         {{ $totalBooks }}

                                     </h2>

                                 </div>

                                 <i class="bi bi-book-half display-5 opacity-75"></i>

                             </div>

                         </div>

                     </div>

                 </div>

                 <div class="col-lg-4 col-md-6">

                     <div class="card border-0 shadow-sm bg-success text-white">

                         <div class="card-body">

                             <div class="d-flex justify-content-between align-items-center">

                                 <div>

                                     <h6 class="mb-2">

                                         Active Books

                                     </h6>

                                     <h2 class="fw-bold">

                                         {{ $activeBooks }}

                                     </h2>

                                 </div>

                                 <i class="bi bi-check-circle display-5 opacity-75"></i>

                             </div>

                         </div>

                     </div>

                 </div>

                 <div class="col-lg-4 col-md-6">

                     <div class="card border-0 shadow-sm bg-danger text-white">

                         <div class="card-body">

                             <div class="d-flex justify-content-between align-items-center">

                                 <div>

                                     <h6 class="mb-2">

                                         Out Of Stock

                                     </h6>

                                     <h2 class="fw-bold">

                                         {{ $outOfStock }}

                                     </h2>

                                 </div>

                                 <i class="bi bi-exclamation-triangle display-5 opacity-75"></i>

                             </div>

                         </div>

                     </div>

                 </div>

             </div>

             <!-- Search Card -->

             <div class="card border-0 shadow-sm mb-4">

                 <div class="card-body">

                     <form action="{{ route('admin.books') }}" method="GET">

                         <div class="row">

                             <div class="col-md-5">

                                 <input type="text" name="search" value="{{ $search }}" class="form-control"
                                     placeholder="Search books by title...">

                             </div>

                             <div class="col-md-2">

                                 <button class="btn btn-primary w-100">

                                     <i class="bi bi-search me-2"></i>

                                     Search

                                 </button>

                             </div>

                         </div>

                     </form>

                 </div>

             </div>

             <!-- Books Table -->

             <div class="card border-0 shadow-sm">

                 <div class="card-header bg-white">

                     <h5 class="mb-0 fw-bold">

                         Books List

                     </h5>

                 </div>

                 <div class="card-body">

                     <div class="table-responsive">

                         <table class="table table-hover align-middle">

                             <thead class="table-dark">

                                 <tr>

                                     <th>#</th>

                                     <th>Image</th>

                                     <th>Title</th>

                                     <th>Category</th>

                                     <th>Author</th>

                                     <th>Price</th>

                                     <th>Stock</th>

                                     <th>Status</th>

                                     <th width="180">

                                         Action

                                     </th>

                                 </tr>

                             </thead>

                             <tbody>

                                 @if ($books->count())
                                     @foreach ($books as $key => $book)
                                         <tr>

                                             <td>{{ $books->firstItem() + $key }}</td>

                                             <!-- Image -->
                                             <td>

                                                 <img src="{{ asset('uploads/books/' . $book->image) }}" width="60"
                                                     height="80" class="rounded shadow-sm" style="object-fit:cover;">

                                             </td>

                                             <!-- Title -->
                                             <td>

                                                 <strong>{{ $book->title }}</strong>

                                                 @if ($book->is_popular)
                                                     <span class="badge bg-primary ms-1">
                                                         Popular
                                                     </span>
                                                 @endif

                                                 @if ($book->is_best_selling)
                                                     <span class="badge bg-warning text-dark ms-1">
                                                         Best Seller
                                                     </span>
                                                 @endif

                                                 @if ($book->is_featured)
                                                     <span class="badge bg-info ms-1">
                                                         Featured
                                                     </span>
                                                 @endif

                                             </td>

                                             <!-- Category -->
                                             <td>

                                                 {{ $book->category->name ?? '-' }}

                                             </td>

                                             <!-- Author -->
                                             <td>

                                                 {{ $book->author->name ?? '-' }}

                                             </td>

                                             <!-- Price -->
                                             <td>

                                                 <strong>Rs {{ number_format($book->price, 2) }}</strong>

                                                 @if ($book->discount_price)
                                                     <br>

                                                     <small class="text-danger">

                                                         Rs {{ number_format($book->discount_price, 2) }}

                                                     </small>
                                                 @endif

                                             </td>

                                             <!-- Stock -->
                                             <td>

                                                 @if ($book->stock > 0)
                                                     <span class="badge bg-success">

                                                         {{ $book->stock }}

                                                     </span>
                                                 @else
                                                     <span class="badge bg-danger">

                                                         Out Of Stock

                                                     </span>
                                                 @endif

                                             </td>

                                             <!-- Status -->
                                             <td>

                                                 @if ($book->status)
                                                     <a href="{{ route('admin.books.status', $book->id) }}"
                                                         class="btn btn-success btn-sm">

                                                         Active

                                                     </a>
                                                 @else
                                                     <a href="{{ route('admin.books.status', $book->id) }}"
                                                         class="btn btn-danger btn-sm">

                                                         Inactive

                                                     </a>
                                                 @endif

                                             </td>

                                             <!-- Action -->
                                             <td>

                                                 <a href="{{ route('admin.books.edit', $book->id) }}"
                                                     class="btn btn-warning btn-sm">

                                                     <i class="bi bi-pencil-square"></i>

                                                 </a>

                                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                     data-bs-target="#deleteBook{{ $book->id }}">

                                                     <i class="bi bi-trash"></i>

                                                 </button>

                                             </td>

                                         </tr>



                                         <!-- Delete Modal -->

                                         <div class="modal fade" id="deleteBook{{ $book->id }}" tabindex="-1">

                                             <div class="modal-dialog modal-dialog-centered">

                                                 <div class="modal-content">

                                                     <div class="modal-header bg-danger text-white">

                                                         <h5 class="modal-title">

                                                             Delete Book

                                                         </h5>

                                                         <button type="button" class="btn-close btn-close-white"
                                                             data-bs-dismiss="modal">
                                                         </button>

                                                     </div>

                                                     <div class="modal-body text-center">

                                                         <i
                                                             class="bi bi-exclamation-triangle-fill text-danger display-3"></i>

                                                         <h5 class="mt-3">

                                                             Are you sure?

                                                         </h5>

                                                         <p class="text-muted">

                                                             You want to delete

                                                             <strong>{{ $book->title }}</strong> ?

                                                         </p>

                                                     </div>

                                                     <div class="modal-footer">

                                                         <button class="btn btn-secondary" data-bs-dismiss="modal">

                                                             Cancel

                                                         </button>

                                                         <a href="{{ route('admin.books.delete', $book->id) }}"
                                                             class="btn btn-danger">

                                                             Yes, Delete

                                                         </a>

                                                     </div>

                                                 </div>

                                             </div>

                                         </div>
                                     @endforeach
                                 @else
                                     <tr>

                                         <td colspan="9" class="text-center py-5">

                                             <h5 class="text-muted">

                                                 No Books Found

                                             </h5>

                                         </td>

                                     </tr>
                                 @endif

                             </tbody>

                         </table>

                         </table>

                     </div>

                     <!-- Pagination -->

                     <div class="d-flex justify-content-between align-items-center mt-4">

                         <div class="text-muted">

                             Showing

                             {{ $books->firstItem() ?? 0 }}

                             to

                             {{ $books->lastItem() ?? 0 }}

                             of

                             {{ $books->total() }}

                             Books

                         </div>

                         {{ $books->onEachSide(1)->links() }}

                     </div>

                 </div>

             </div>

         </div>


     @endsection

 </body>

 </html>
