@extends('Layouts.Adminlayouts')

@section('content')

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Add New Competition</h3>

            <a href="{{ route('admin.competitions') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.competitions.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card shadow">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Competition Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Competition Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prize</label>
                        <input type="text" name="prize" class="form-control">
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label class="form-label">Start Date</label>

                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">End Date</label>

                            <input type="date" name="end_date" class="form-control" required>
                        </div>

                    </div>

                    <div class="mt-3">

                        <label class="form-label">
                            Competition Description
                        </label>

                        <textarea name="description" rows="5" class="form-control" required></textarea>

                    </div>

                    <div class="mt-3">

                        <label class="form-label">
                            Competition Rules
                        </label>

                        <textarea name="rules" rows="5" class="form-control"></textarea>

                    </div>

                </div>

                <div class="card-footer">

                    <button class="btn btn-success">
                        Save Competition
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection
