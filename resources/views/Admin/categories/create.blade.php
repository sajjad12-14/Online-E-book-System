@extends('Layouts.Adminlayouts')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                Add New Category
            </h3>

            <a href="{{ route('admin.categories') }}" class="btn btn-secondary">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Category Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter Category Name"
                           value="{{ old('name') }}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Description
                    </label>

                    <textarea name="description"
                              rows="5"
                              class="form-control"
                              placeholder="Enter Category Description">{{ old('description') }}</textarea>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status" class="form-select">

                        <option value="1">Active</option>

                        <option value="0">Inactive</option>

                    </select>

                </div>

                <button type="submit" class="btn btn-success px-4">

                    <i class="bi bi-check-circle me-2"></i>

                    Save Category

                </button>

            </form>

        </div>

    </div>

</div>

@endsection