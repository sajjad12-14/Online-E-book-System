@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">Competitions</h3>

            <a href="{{ route('admin.competitions.create') }}" class="btn btn-success">

                + Add Competition

            </a>

        </div>

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif
        <div class="d-flex justify-content-between mb-3">

            <form action="{{ route('admin.competitions') }}" method="GET" class="d-flex">

                <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2"
                    placeholder="Search Competition">

                <button class="btn btn-dark">

                    Search

                </button>

            </form>



        </div>
        <div class="row mb-4">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-body text-center">

                        <h5>Total Competitions</h5>

                        <h2>{{ $totalCompetitions }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-body text-center">

                        <h5>Active</h5>

                        <h2 class="text-success">

                            {{ $activeCompetitions }}

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-body text-center">

                        <h5>Inactive</h5>

                        <h2 class="text-danger">

                            {{ $inactiveCompetitions }}

                        </h2>

                    </div>

                </div>

            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="card shadow">

            <div class="card-body">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Image</th>

                            <th>Title</th>

                            <th>Prize</th>

                            <th>Start Date</th>

                            <th>End Date</th>

                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($competitions as $competition)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td width="90">

                                    @if ($competition->image)
                                        <img src="{{ asset('uploads/competitions/' . $competition->image) }}" width="70"
                                            class="rounded">
                                    @else
                                        No Image
                                    @endif

                                </td>

                                <td>{{ $competition->title }}</td>

                                <td>{{ $competition->prize }}</td>

                                <td>{{ $competition->start_date }}</td>

                                <td>{{ $competition->end_date }}</td>

                                <td>

                                    @if ($competition->status)
                                        <span class="badge bg-success">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>
                                    @endif

                                </td>
                                <td>

                                    <a href="{{ route('admin.competitions.edit', $competition->id) }}"
                                        class="btn btn-primary btn-sm">
                                        Edit
                                    </a>


                                    <a href="{{ route('admin.competitions.delete', $competition->id) }}"
                                        class="btn btn-danger btn-sm" ">

                                            Delete

                                        </a>

                                    </td>

                                </tr>

                        @empty

                                <tr>

                                    <td colspan="7" class="text-center">

                                        No Competition Found

                                    </td>

                                </tr>
     @endforelse

                    </tbody>

                </table>

                <div class="mt-3">

                    {{ $competitions->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
