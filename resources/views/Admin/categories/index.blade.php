@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid">

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                Categories Management
            </h2>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">

                <i class="bi bi-plus-circle me-2"></i>

                Add New Category

            </a>

        </div>

        <!-- Success Message -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <form method="GET" action="{{ route('admin.categories') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input type="text" name="search" class="form-control" placeholder="Search Category..."
                                value="{{ $search }}">

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-primary w-100">

                                <i class="bi bi-search"></i>

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- Table -->

        <div class="card shadow border-0">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>#</th>

                                <th>Category Name</th>

                                <th>Description</th>

                                <th>Status</th>

                                <th>Created</th>

                                <th class="text-center">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($categories as $category)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $category->name }}</td>

                                    <td>

                                        {{ \Illuminate\Support\Str::limit($category->description, 60) }}

                                    </td>

                                    <td>

                                        @if ($category->status)
                                            <a href="{{ route('admin.categories.status', $category->id) }}"
                                                class="badge bg-success text-decoration-none px-3 py-2">

                                                Active

                                            </a>
                                        @else
                                            <a href="{{ route('admin.categories.status', $category->id) }}"
                                                class="badge bg-danger text-decoration-none px-3 py-2">

                                                Inactive

                                            </a>
                                        @endif
                                    </td>

                                    <td>

                                        {{ $category->created_at->format('d M Y') }}

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-warning btn-sm me-2">

                                            <i class="bi bi-pencil-square"></i>

                                        </a>

                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $category->id }}">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </td>

                                </tr>

                                <!-- Delete Modal -->

                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                    aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-danger text-white">

                                                <h5 class="modal-title">

                                                    Delete Category

                                                </h5>

                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal">

                                                </button>

                                            </div>

                                            <div class="modal-body text-center py-4">

                                                <i class="bi bi-exclamation-triangle-fill text-danger"
                                                    style="font-size:70px;"></i>

                                                <h3 class="mt-3">

                                                    Are you sure?

                                                </h3>

                                                <p class="text-muted">

                                                    You want to delete

                                                    <strong>

                                                        {{ $category->name }}

                                                    </strong>

                                                    ?

                                                </p>

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn btn-secondary" data-bs-dismiss="modal">

                                                    Cancel

                                                </button>

                                                <a href="{{ route('admin.categories.delete', $category->id) }}"
                                                    class="btn btn-danger">

                                                    Yes, Delete

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-5">

                                        <i class="bi bi-folder-x fs-1 text-secondary"></i>

                                        <h5 class="mt-3">

                                            No Categories Found

                                        </h5>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    <div class="d-flex justify-content-end mt-3">

                        {{ $categories->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
