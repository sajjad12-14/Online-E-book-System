@extends('Layouts.Adminlayouts')

@section('content')

<div class="container-fluid">

    <!-- Heading -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">

            Add New Author

        </h2>

        <a href="{{ route('admin.authors') }}" class="btn btn-secondary">

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

            <form action="{{ route('admin.authors.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Name -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold">

                            Author Name

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Enter Author Name">

                    </div>

                    <!-- Status -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold">

                            Status

                        </label>

                        <select name="status" class="form-select">

                            <option value="1">Active</option>

                            <option value="0">Inactive</option>

                        </select>

                    </div>

                    <!-- Bio -->

                    <div class="col-12 mb-3">

                        <label class="form-label fw-bold">

                            Bio

                        </label>

                        <textarea
                            name="bio"
                            rows="5"
                            class="form-control"
                            placeholder="Write Author Bio...">{{ old('bio') }}</textarea>

                    </div>

                    <!-- Image -->

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-bold">

                            Author Image

                        </label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                </div>

                <button class="btn btn-success px-4">

                    <i class="bi bi-check-circle me-2"></i>

                    Save Author

                </button>

            </form>

        </div>

    </div>

</div>

@endsection