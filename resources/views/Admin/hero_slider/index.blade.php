@extends('Layouts.Adminlayouts')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')

    <div class="row mb-4">

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="text-muted mb-1">
                            Total Sliders
                        </h6>

                        <h2 class="fw-bold mb-0">
                            {{ $totalSliders }}
                        </h2>

                    </div>

                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;">

                        <i class="bi bi-images text-white fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="text-muted mb-1">
                            Active Sliders
                        </h6>

                        <h2 class="fw-bold text-success mb-0">
                            {{ $activeSliders }}
                        </h2>

                    </div>

                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;">

                        <i class="bi bi-check-circle text-white fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <h6 class="text-muted mb-1">
                            Inactive Sliders
                        </h6>

                        <h2 class="fw-bold text-danger mb-0">
                            {{ $inactiveSliders }}
                        </h2>

                    </div>

                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center"
                        style="width:60px;height:60px;">

                        <i class="bi bi-x-circle text-white fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Heading + Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Hero Slider Management
        </h2>

        <a href="/admin/hero-slider/create" class="btn btn-success">

            <i class="bi bi-plus-circle me-2"></i>

            Add New Slider

        </a>

    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">


                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @if ($sliders->count() > 0)
                            @foreach ($sliders as $slider)
                                <tr>

                                    <td>{{ $sliders->firstItem() + $loop->index }}</td>

                                    <td>

                                        <img src="{{ asset('uploads/hero_slider/' . $slider->image) }}" width="100"
                                            height="70" class="rounded shadow-sm" style="object-fit: cover;">

                                    </td>

                                    <td>{{ $slider->title }}</td>

                                    <td>{{ Str::limit($slider->description, 60) }}</td>

                                    <td>

                                        @if ($slider->status)
                                            <a href="/admin/hero-slider/status/{{ $slider->id }}"
                                                class="badge bg-success text-decoration-none px-3 py-2">

                                                Active

                                            </a>
                                        @else
                                            <a href="/admin/hero-slider/status/{{ $slider->id }}"
                                                class="badge bg-danger text-decoration-none px-3 py-2">

                                                Inactive

                                            </a>
                                        @endif

                                    </td>

                                    <td>

                                        {{ $slider->created_at->format('d M Y') }}

                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="/admin/hero-slider/edit/{{ $slider->id }}"
                                                class="btn btn-warning btn-sm">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $slider->id }}">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </div>

                                    </td>


                                </tr>
                                <!-- Delete Modal -->

                                <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1"
                                    aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-danger text-white">

                                                <h5 class="modal-title">

                                                    Delete Hero Slider

                                                </h5>

                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal">

                                                </button>

                                            </div>

                                            <div class="modal-body text-center">

                                                <i class="bi bi-exclamation-triangle-fill text-danger display-4"></i>

                                                <h5 class="mt-3">

                                                    Are you sure?

                                                </h5>

                                                <p>

                                                    You want to delete

                                                    <strong>{{ $slider->title }}</strong>

                                                    ?

                                                </p>

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn btn-secondary" data-bs-dismiss="modal">

                                                    Cancel

                                                </button>

                                                <a href="/admin/hero-slider/delete/{{ $slider->id }}"
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

                                <td colspan="6" class="text-center">
                                    <div class="py-4">

                                        <i class="bi bi-images fs-1 text-secondary"></i>

                                        <h5 class="mt-3">

                                            No Hero Slider Found

                                        </h5>

                                    </div>
                                </td>

                            </tr>
                        @endif

                    </tbody>

                </table>
                <div class="d-flex justify-content-end mt-3">

                    {{ $sliders->links() }}

                </div>

            </div>

        </div>

    </div>

@endsection
