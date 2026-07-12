@extends('Layouts.Adminlayouts')

@section('content')

    <div class="container-fluid">

        <!-- Heading -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Edit Book

            </h2>

            <a href="{{ route('admin.books') }}" class="btn btn-secondary">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

        <!-- Validation Errors -->

        @if ($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <!-- Form -->

        <div class="card shadow border-0">

            <div class="card-body">

                <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <!-- Book Title -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Book Title

                            </label>

                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $book->title) }}" placeholder="Enter Book Title">

                        </div>

                        <!-- Category -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Category

                            </label>

                            <select name="category_id" class="form-select">

                                <option value="">

                                    Select Category

                                </option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Author -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Author

                            </label>

                            <select name="author_id" class="form-select">

                                <option value="">

                                    Select Author

                                </option>

                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>

                                        {{ $author->name }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Price -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Price

                            </label>

                            <input type="number" name="price" class="form-control"
                                value="{{ old('price', $book->price) }}">

                        </div>

                        <!-- Discount Price -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Discount Price

                            </label>

                            <input type="number" name="discount_price" class="form-control"
                                value="{{ old('discount_price', $book->discount_price) }}">

                        </div>

                        <!-- Stock -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Stock

                            </label>

                            <input type="number" name="stock" class="form-control"
                                value="{{ old('stock', $book->stock) }}">
                        </div>
                        <!-- Description -->

                        <div class="col-12 mb-3">

                            <label class="form-label fw-bold">

                                Description

                            </label>

                            <textarea name="description" rows="5" class="form-control" placeholder="Enter Book Description">{{ old('description', $book->description) }}</textarea>

                        </div>

                        <!-- Book Image -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Book Image

                            </label>

                            <input type="file" name="image" class="form-control">

                            @if ($book->image)
                                <div class="mt-2">

                                    <img src="{{ asset('uploads/books/' . $book->image) }}" width="120"
                                        class="img-thumbnail">

                                </div>
                            @endif

                        </div>

                        <!-- PDF File -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">

                                Book PDF

                            </label>

                            <input type="file" name="pdf" class="form-control" accept=".pdf">

                            @if ($book->pdf)
                                <div class="mt-2">

                                    <a href="{{ asset('uploads/pdfs/' . $book->pdf) }}" target="_blank"
                                        class="btn btn-outline-primary btn-sm">

                                        <i class="bi bi-file-earmark-pdf"></i>

                                        View Current PDF

                                    </a>

                                </div>
                            @endif

                        </div>

                        <!-- Home Page Options -->

                        <div class="col-md-4 mb-3">

                            <div class="form-check mt-4">

                                <input class="form-check-input" type="checkbox" name="is_popular" value="1"
                                    id="popular" {{ old('is_popular', $book->is_popular) ? 'checked' : '' }}>

                                <label class="form-check-label fw-bold" for="popular">

                                    Our Most Popular Book

                                </label>

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <div class="form-check mt-4">

                                <input class="form-check-input" type="checkbox" name="is_best_selling" value="1"
                                    id="best" {{ old('is_best_selling', $book->is_best_selling) ? 'checked' : '' }}>

                                <label class="form-check-label fw-bold" for="best">

                                    Best Selling Book

                                </label>

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <div class="form-check mt-4">

                                <input class="form-check-input" type="checkbox" name="is_featured" value="1"
                                    id="featured" {{ old('is_featured', $book->is_featured) ? 'checked' : '' }}>

                                <label class="form-check-label fw-bold" for="featured">

                                    Featured Book

                                </label>

                            </div>

                        </div>

                        <!-- Status -->

                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-bold">

                                Status

                            </label>

                            <select name="status" class="form-select">

                                <option value="1" {{ old('status', $book->status) == 1 ? 'selected' : '' }}>

                                    Active

                                </option>

                                <option value="0" {{ old('status', $book->status) == 0 ? 'selected' : '' }}>

                                    Inactive

                                </option>

                            </select>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-success px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Update Book

                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
