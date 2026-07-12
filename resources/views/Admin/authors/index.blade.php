@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid">

        <!-- Statistics Cards -->

        <div class="row mb-4">

            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted mb-1">

                                Total Authors

                            </h6>

                            <h2 class="fw-bold mb-0">

                                {{ $totalAuthors }}

                            </h2>

                        </div>

                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">

                            <i class="bi bi-people-fill text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted mb-1">

                                Active Authors

                            </h6>

                            <h2 class="fw-bold text-success mb-0">

                                {{ $activeAuthors }}

                            </h2>

                        </div>

                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">

                            <i class="bi bi-check-circle-fill text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6">

                <div class="card border-0 shadow-sm">

                    <div class="card-body d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted mb-1">

                                Inactive Authors

                            </h6>

                            <h2 class="fw-bold text-danger mb-0">

                                {{ $inactiveAuthors }}

                            </h2>

                        </div>

                        <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">

                            <i class="bi bi-x-circle-fill text-white fs-3"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Heading -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Authors Management

            </h2>

            <a href="{{ route('admin.authors.create') }}" class="btn btn-success">

                <i class="bi bi-plus-circle me-2"></i>

                Add New Author

            </a>

        </div>

        <!-- Success Message -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif

        <!-- Search -->

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <form method="GET" action="{{ route('admin.authors') }}">

                    <div class="row">

                        <div class="col-md-10">

                            <input type="text" name="search" class="form-control" placeholder="Search Author..."
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

                                <th>Image</th>

                                <th>Name</th>

                                <th>Bio</th>

                                <th>Status</th>

                                <th>Created</th>

                                <th class="text-center">Action</th>

                            </tr>

                        </thead>

                        @forelse($authors as $author)
                            <tr>

                                <td>{{ $authors->firstItem() + $loop->index }}</td>

                                <td>

                                    <img src="{{ asset('uploads/authors/' . $author->image) }}" width="70"
                                        height="70" class="rounded-circle shadow" style="object-fit:cover;">

                                </td>

                                <td>

                                    {{ $author->name }}

                                </td>

                                <td>

                                    {{ \Illuminate\Support\Str::limit($author->bio, 60) }}

                                </td>

                                <td>

                                    @if ($author->status)
                                        <a href="{{ route('admin.authors.status', $author->id) }}"
                                            class="badge bg-success text-decoration-none px-3 py-2">

                                            Active

                                        </a>
                                    @else
                                        <a href="{{ route('admin.authors.status', $author->id) }}"
                                            class="badge bg-danger text-decoration-none px-3 py-2">

                                            Inactive

                                        </a>
                                    @endif

                                </td>

                                <td>

                                    {{ $author->created_at->format('d M Y') }}

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('admin.authors.edit', $author->id) }}"
                                        class="btn btn-warning btn-sm me-2">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $author->id }}">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </td>

                            </tr>

                            <!-- Delete Modal -->

                            <div class="modal fade" id="deleteModal{{ $author->id }}" tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered">

                                    <div class="modal-content">

                                        <div class="modal-header bg-danger text-white">

                                            <h5 class="modal-title">

                                                Delete Author

                                            </h5>

                                            <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

                                        </div>

                                        <div class="modal-body text-center">

                                            <i class="bi bi-exclamation-triangle-fill text-danger"
                                                style="font-size:70px;"></i>

                                            <h3 class="mt-3">

                                                Are you sure?

                                            </h3>

                                            <p>

                                                You want to delete

                                                <strong>{{ $author->name }}</strong>

                                                ?

                                            </p>

                                        </div>

                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" data-bs-dismiss="modal">

                                                Cancel

                                            </button>

                                            <a href="{{ route('admin.authors.delete', $author->id) }}"
                                                class="btn btn-danger">

                                                Yes, Delete

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <i class="bi bi-person-x fs-1 text-secondary"></i>

                                    <h5 class="mt-3">

                                        No Authors Found

                                    </h5>

                                </td>

                            </tr>
                        @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-end mt-3">

                    {{ $authors->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection

<tbody>
